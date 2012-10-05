<?php

/**
 * This is the model class for table "apuestas".
 *
 * The followings are the available columns in table 'apuestas':
 * @property integer $id_apuesta
 * @property integer $id_usuario
 * @property integer $id_evento
 * @property integer $Marcador1
 * @property integer $Marcador2
 * @property string $FechaRegistro
 * @property string $FechaLimite
 * @property string $Estado
 * @property string $FechaCreacion
 * @property integer $id_usuarioC
 * @property string $FechaModificacion
 * @property integer $id_usuarioM
 *
 * The followings are the available model relations:
 * @property Usuarios $idUsuarioM
 * @property Eventos $idEvento
 * @property Usuarios $idUsuarioC
 * @property Usuarios $idUsuario
 */
class Apuestas extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Apuestas the static model class
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
		return 'apuestas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_usuario, id_evento, Marcador1, Marcador2, FechaRegistro, FechaLimite, Estado, FechaCreacion, id_usuarioC, FechaModificacion, id_usuarioM', 'required'),
			array('id_usuario, id_evento, Marcador1, Marcador2, id_usuarioC, id_usuarioM', 'numerical', 'integerOnly'=>true),
			array('Estado', 'length', 'max'=>1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_apuesta, id_usuario, id_evento, Marcador1, Marcador2, FechaRegistro, FechaLimite, Estado, FechaCreacion, id_usuarioC, FechaModificacion, id_usuarioM', 'safe', 'on'=>'search'),
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
			'idUsuarioM' => array(self::BELONGS_TO, 'Usuarios', 'id_usuarioM'),
			'idEvento' => array(self::BELONGS_TO, 'Eventos', 'id_evento'),
			'idUsuarioC' => array(self::BELONGS_TO, 'Usuarios', 'id_usuarioC'),
			'idUsuario' => array(self::BELONGS_TO, 'Usuarios', 'id_usuario'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_apuesta' => 'ID Apuesta',
			'id_usuario' => 'Usuario',
			'id_evento' => 'Evento',
			'Marcador1' => 'Marcador 1',
			'Marcador2' => 'Marcador 2',
			'FechaRegistro' => 'Fecha de Registro',
			'FechaLimite' => 'Fecha Limite de Apuesta',
			'Estado' => 'Estado',
			'FechaCreacion' => 'Fecha de Creacion',
			'id_usuarioC' => 'Usuario Creador',
			'FechaModificacion' => 'Fecha Modificacion',
			'id_usuarioM' => 'Usuario Modificador',
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

		$criteria->compare('id_apuesta',$this->id_apuesta);
		$criteria->compare('id_usuario',$this->id_usuario);
		$criteria->compare('id_evento',$this->id_evento);
		$criteria->compare('Marcador1',$this->Marcador1);
		$criteria->compare('Marcador2',$this->Marcador2);
		$criteria->compare('FechaRegistro',$this->FechaRegistro,true);
		$criteria->compare('FechaLimite',$this->FechaLimite,true);
		$criteria->compare('Estado',$this->Estado,true);
		/*$criteria->compare('FechaCreacion',$this->FechaCreacion,true);
		$criteria->compare('id_usuarioC',$this->id_usuarioC);
		$criteria->compare('FechaModificacion',$this->FechaModificacion,true);
		$criteria->compare('id_usuarioM',$this->id_usuarioM);*/

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}