<?php

/**
 * This is the model class for table "monedas".
 *
 * The followings are the available columns in table 'monedas':
 * @property integer $id_moneda
 * @property string $nombre
 * @property string $abreviatura
 * @property integer $id_pais
 */
class Monedas extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Monedas the static model class
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
		return 'monedas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_moneda, nombre, abreviatura, id_pais', 'required'),
			array('id_moneda, id_pais', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>100),
			array('abreviatura', 'length', 'max'=>5),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_moneda, nombre, abreviatura, id_pais', 'safe', 'on'=>'search'),
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
			'id_moneda' => 'Id Moneda',
			'nombre' => 'Nombre',
			'abreviatura' => 'Abreviatura',
			'id_pais' => 'Id Pais',
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

		$criteria->compare('id_moneda',$this->id_moneda);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('abreviatura',$this->abreviatura,true);
		$criteria->compare('id_pais',$this->id_pais);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}