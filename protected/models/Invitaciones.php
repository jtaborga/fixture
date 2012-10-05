<?php

/**
 * This is the model class for table "invitaciones".
 *
 * The followings are the available columns in table 'invitaciones':
 * @property int $id_invitacion
 * @property int $id_grupo
 * @property integer $id_usuario
 * @property string $FechaCreacion
 * @property integer $Estado
 * @property integer $NuevoUsr
 */
class Invitaciones extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Invitaciones the static model class
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
		return 'invitaciones';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_invitacion, id_grupo, id_usuario, FechaCreacion, Estado, NuevoUsr', 'required'),
			array('id_invitacion, id_grupo, id_usuario, Estado, NuevoUsr', 'numerical', 'integerOnly'=>true),
			array('id_grupo, id_invitacion', 'length', 'max'=>11),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_invitacion, id_grupo, id_usuario, FechaCreacion, Estado, NuevoUsr', 'safe', 'on'=>'search'),
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
			'id_invitacion' => 'Id Invitacion',
			'id_grupo' => 'Id Grupo',
			'id_usuario' => 'Id Usuario',
			'FechaCreacion' => 'Fecha Creacion',
			'Estado' => 'Estado',
			'NuevoUsr' => 'Nuevo Usr',
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

		$criteria->compare('id_invitacion',$this->id_invitacion,true);
		$criteria->compare('id_grupo',$this->id_grupo,true);
		$criteria->compare('id_usuario',$this->id_usuario);
		$criteria->compare('FechaCreacion',$this->FechaCreacion,true);
		$criteria->compare('Estado',$this->Estado);
		$criteria->compare('NuevoUsr',$this->NuevoUsr);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}