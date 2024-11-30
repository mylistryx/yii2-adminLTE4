<?php

namespace app\controllers;

use app\components\controllers\WebController;
use app\components\forms\Form;
use app\enums\CalculationType;
use app\enums\RingMetalProfile;
use app\models\Calculation\Calculation;
use app\models\Calculation\CalculationGem;
use app\models\Calculation\CalculationGroup;
use app\models\Calculation\CalculationSearch;
use app\models\Calculation\CalculationWork;
use Yii;
use yii\base\InvalidConfigException;
use yii\db\Exception;
use yii\filters\AccessControl;
use yii\web\Response;

final class CalculationController extends WebController
{
    public function behaviors(): array
    {
        return [
            'Access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex(): Response
    {
        $searchModel = new CalculationSearch();
        $dataProvider = $searchModel->search($this->queryParams());

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * @throws Exception
     * @throws InvalidConfigException
     */
    public function actionCreate(): Response
    {
        $this->layout = '@app/views/layouts/wide.php';
        $modelCalculationGroup = new CalculationGroup([
            'type' => CalculationType::defaultValue()->value,
        ]);
        $modelsCalculation = [
            new Calculation([
                'width' => 5,
                'height' => 1.2,
                'inaccuracy' => 6,
                'size' => 18,
                'metal_id' => RingMetalProfile::defaultValue(),
            ]),
        ];

        $modelsCalculationGem = [[new CalculationGem()]];
        $modelsCalculationWork = [[new CalculationWork()]];

        if (Yii::$app->request->isPost && $modelCalculationGroup->load(Yii::$app->request->post())) {

            Form::createMultiple(Calculation::class);
            Form::loadMultiple($modelsCalculation, $this->post());

            $valid = $modelCalculationGroup->validate();

            if ($valid) {
                $transaction = Yii::$app->db->beginTransaction();
                foreach ($modelsCalculation as $key => $modelCalculation) {
                    if ($modelCalculation->id) {
                        continue;
                    }

                    $modelCalculation->client_id = $modelCalculationGroup->client_id;
                    $modelCalculation->manager_id = $modelCalculationGroup->manager_id;
                    $modelCalculation->date = $modelCalculationGroup->date;
                    $modelCalculation->type = $modelCalculationGroup->type;
                    $modelCalculation->metal_rate_id = $modelCalculation->metal->rate->id;
                    $valid = $valid && $modelCalculation->save();

                    $gemsFormName = (new CalculationGem())->formName();
                    $worksFormName = (new CalculationWork())->formName();

                    if (!empty($_POST[$gemsFormName][$key])) {
                        foreach ($_POST[$gemsFormName][$key] as $keyGem => $dataGem) {
                            $model = new CalculationGem($dataGem);
                            $model->calculation_id = $modelCalculation->id;
                            $model->gem_rate_id = $model->gem->rate->id;
                            $valid = $valid && $model->save();
                        }
                    }

                    if (!empty($_POST[$worksFormName][$key])) {
                        foreach ($_POST[$worksFormName][$key] as $keyGem => $dataWork) {
                            $model = new CalculationWork($dataWork);
                            $model->calculation_id = $modelCalculation->id;
                            $valid = $valid && $model->save();
                        }
                    }
                }
            }

            $valid = $valid && Form::validateMultiple($modelsCalculation);

            if ($valid) {
                $transaction->commit();

                return $this->redirect(['index']);
            }
        }

        return $this->render('create', [
            'modelCalculationGroup' => $modelCalculationGroup,
            'modelsCalculation' => $modelsCalculation,
            'modelsCalculationGem' => $modelsCalculationGem,
            'modelsCalculationWork' => $modelsCalculationWork,
        ]);
    }

    public function actionView(int $id): Response
    {
        $this->layout = '@app/views/layouts/wide.php';
        $model = Calculation::findOne($id);
        $modelCalculationGroup = new CalculationGroup([
            'client_id' => $model->client_id,
            'manager_id' => $model->manager_id,
            'type' => $model->type,
            'date' => date('Y-m-d'),
        ]);

        if (Yii::$app->request->isPost && $modelCalculationGroup->load(Yii::$app->request->post())) {
            $modelsCalculation = Form::createMultiple(Calculation::class);
            Form::loadMultiple($modelsCalculation, $this->post());

            $valid = $modelCalculationGroup->validate();

            if ($valid) {
                $transaction = Yii::$app->db->beginTransaction();
                foreach ($modelsCalculation as $key => &$modelCalculation) {
                    if ($modelCalculation->id) {
                        unset($modelsCalculation[$key]);
                        continue;
                    }

                    $modelCalculation->client_id = $modelCalculationGroup->client_id;
                    $modelCalculation->manager_id = $modelCalculationGroup->manager_id;
//                    $modelCalculation->date = $modelCalculationGroup->date;
                    $modelCalculation->type = $modelCalculationGroup->type;
                    $modelCalculation->metal_rate_id = $modelCalculation->metal->rate->id;
                    $valid = $valid && $modelCalculation->save();
                    if (!$valid) {
                        break;
                    }

                    $gemsFormName = (new CalculationGem())->formName();
                    $worksFormName = (new CalculationWork())->formName();

                    if (!empty($_POST[$gemsFormName][$key])) {
                        foreach ($_POST[$gemsFormName][$key] as $keyGem => $dataGem) {
                            $model = new CalculationGem($dataGem);
                            $model->gem_rate_id = $model->gem->rate->id;
                            $model->calculation_id = $modelCalculation->id;
                            $valid = $valid && $model->save();
                        }
                    }

                    if (!empty($_POST[$worksFormName][$key])) {
                        foreach ($_POST[$worksFormName][$key] as $keyGem => $dataWork) {
                            $model = new CalculationWork($dataWork);
                            $model->calculation_id = $modelCalculation->id;
                            $valid = $valid && $model->save();
                        }
                    }
                }

                $valid = $valid && Form::validateMultiple($modelsCalculation);

                if ($valid) {
                    $transaction->commit();
                    return $this->redirect(['index']);
                }
            }
        }

        $modelsCalculationGem[] = $model->calculationGems ?? [new CalculationGem()];
        $modelsCalculationWork[] = $model->calculationWorks ?? [new CalculationWork()];

        $modelX = clone $model;
        $modelX->id = null;
        $modelX->date = date('Y-m-d');

        $newModelsCalculationGems = [];
        foreach ($model->calculationGems as $modelCalculationGem) {
            $newModelsCalculationGems[] = new CalculationGem([
                'gem_id' => $modelCalculationGem->gem_id,
                'quantity' => $modelCalculationGem->quantity,
                'mount_price' => $modelCalculationGem->mount_price,
            ]);
        }

        $newModelsCalculationWorks = [];
        foreach ($model->calculationWorks as $modelCalculationWork) {
            $newModelsCalculationWorks[] = new CalculationWork([
                'work_id' => $modelCalculationWork->work_id,
                'price' => $modelCalculationWork->price,
            ]);
        }

        $modelsCalculationGem[] = $newModelsCalculationGems ?? [new CalculationGem()];
        $modelsCalculationWork[] = $newModelsCalculationWorks ?? [new CalculationWork()];

        return $this->render('create', [
            'modelCalculationGroup' => $modelCalculationGroup,
            'modelsCalculation' => [$model, $modelX],
            'modelsCalculationGem' => $modelsCalculationGem,
            'modelsCalculationWork' => $modelsCalculationWork,
        ]);
    }
}