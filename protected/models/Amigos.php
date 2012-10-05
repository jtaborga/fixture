<?php

/**
 * This is the model class for table "amigos".
 *
 * The followings are the available columns in table 'amigos':
 * @property integer $id_amigo
 * @property integer $id_usuario_origen
 * @property integer $id_usuario_destino
 * @property string $FechaRegistro
 * @property string $FechaInicio
 */
class Amigos extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Amigos the static model class
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
		return 'amigos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_amigo', 'required'),
			array('id_amigo, id_usuario_origen, id_usuario_destino', 'numerical', 'integerOnly'=>true),
			array('FechaRegistro, FechaInicio', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_amigo, id_usuario_origen, id_usuario_destino, FechaRegistro, FechaInicio', 'safe', 'on'=>'search'),
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
			'id_amigo' => 'Id',
			'id_usuario_origen' => 'Usuario Origen',
			'id_usuario_destino' => 'Usuario Destino',
			'FechaRegistro' => 'Fecha de  Registro',
			'FechaInicio' => 'Fecha Inicio Amistad',
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

		$criteria->compare('id_amigo',$this->id_amigo);
		$criteria->compare('id_usuario_origen',$this->id_usuario_origen);
		$criteria->compare('id_usuario_destino',$this->id_usuario_destino);
		/*$criteria->compare('FechaRegistro',$this->FechaRegistro,true);
		$criteria->compare('FechaInicio',$this->FechaInicio,true);*/

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}