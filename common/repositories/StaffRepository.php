<?php
namespace common\repositories;


use common\models\Staff;
use yii\web\NotFoundHttpException;


class StaffRepository
{

    private $staff;

    public function __construct(Staff $staff)
    {
        $this->staff = $staff;
    }

    private function findById($id)
    {
        return Staff::findOne($id);
    }

    /**
     * @param $id
     * @return Film
     * @throws NotFoundHttpException
     */
    public function getById($id) : Staff
    {
        if (($model = $this->findById($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}