<?php

/**
 * This is the model class for table "costos".
 *
 * The followings are the available columns in table 'costos':
 * @property integer $id_costo
 * @property string $costo
 * @property integer $id_moneda
 */
class Costos extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Costos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'costos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('costo, id_moneda', 'required'),
			array('id_moneda', 'numerical', 'integerOnly'=>true),
			array('costo', 'length', 'max'=>6),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_costo, costo, id_moneda', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_costo' => 'Codigo',
			'costo' => 'Precio',
			'id_moneda' => 'Moneda',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_costo',$this->id_costo);
		$criteria->compare('costo',$this->costo,true);
		$criteria->compare('id_moneda',$this->id_moneda);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}