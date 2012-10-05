<?php

/**
 * This is the model class for table "usuarios".
 *
 * The followings are the available columns in table 'usuarios':
 * @property integer $id_usuario
 * @property string $Nombre
 * @property string $Paterno
 * @property string $Materno
 * @property string $NombreCompleto
 * @property integer $Telefono
 * @property string $Correo
 * @property string $Foto
 * @property string $Ocupacion
 * @property string $CiudadOrigen
 * @property string $BBPIN
 *
 * The followings are the available model relations:
 * @property Apuestas[] $apuestases
 * @property Apuestas[] $apuestases1
 * @property Apuestas[] $apuestases2
 * @property Eventos[] $eventoses
 * @property Eventos[] $eventoses1
 * @property Participantes[] $participantes
 * @property Participantes[] $participantes1
 */
class Usuarios extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Usuarios the static model class
	 */
	 
	public $foto;
	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'usuarios';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Nombre, Paterno, Materno, NombreCompleto, Telefono, Correo, NombreUsuario, Password, Sesion', 'required'),
			array('Telefono', 'numerical', 'integerOnly'=>true),
			array('Nombre, Paterno, Materno, Correo, CiudadOrigen, Ocupacion', 'length', 'max'=>100),
			array('Foto', 'file', 
			       'types'=>'jpg, gif, png, bmp, jpeg',
			       'maxSize'=>1024 * 1024 * 10, // 10MB
			       'tooLarge'=>'The file was larger than 10MB. Please upload a smaller file.',
			       'allowEmpty' => true
			      ),
			
			/*
			array('Foto', 'file', 'types' => 'jpg, gif, png'),
			array('FechaCreacion','default',
              'value'=>new CDbExpression('NOW()'),
              'setOnEmpty'=>false,'on'=>'insert'),
			array('id_usuarioC', 'default',
			  'value'=> Yii::app()->user,
			  'setOnEmpty'=>false, 'on'=>'insert'),
			array('FechaModificacion','default',
			  'value'=>new CDbExpression('NOW()'),
			  'setOnEmpty'=>false,'on'=>'update'),
			array('id_usuarioM', 'default',
			  'value'=> Yii::app()->user,
			  'setOnEmpty'=>false, 'on'=>'update'),*/
			  
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_usuario, Nombre, Paterno, Materno, NombreCompleto, Telefono, Correo, Ocupacion, CiudadOrigen', 'safe', 'on'=>'search'),
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
			'apuestases' => array(self::HAS_MANY, 'Apuestas', 'id_usuarioM'),
			'apuestases1' => array(self::HAS_MANY, 'Apuestas', 'id_usuarioC'),
			'apuestases2' => array(self::HAS_MANY, 'Apuestas', 'id_usuario'),
			'eventoses' => array(self::HAS_MANY, 'Eventos', 'id_usuarioM'),
			'eventoses1' => array(self::HAS_MANY, 'Eventos', 'id_usuarioC'),
			'participantes' => array(self::HAS_MANY, 'Participantes', 'id_usuarioM'),
			'participantes1' => array(self::HAS_MANY, 'Participantes', 'id_usuarioC'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_usuario' => 'Usuario',
			'Nombre' => 'Nombre',
			'Paterno' => 'Paterno',
			'Materno' => 'Materno',
			'Telefono' => 'Telefono',
			'NombreCompleto' => 'Nombre Completo',
			'Correo' => 'Correo',
			'Foto' => 'Foto',
			'CiudadOrigen'=>'Ciudad de Origen',
			'Ocupacion' => 'Ocupacion',
			'BBPIN' => 'PIN Messenger BB'
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

		$criteria->compare('id_usuario',$this->id_usuario);
		$criteria->compare('Nombre',$this->Nombre,true);
		$criteria->compare('Paterno',$this->Paterno,true);
		$criteria->compare('Materno',$this->Materno,true);
		$criteria->compare('Telefono',$this->Telefono);
		$criteria->compare('Correo',$this->Correo,true);
		$criteria->compare('NombreCompleto',$this->NombreCompleto,true);
		$criteria->compare('Ocupacion',$this->Ocupacion,true);
		$criteria->compare('CiudadOrigen',$this->CiudadOrigen,true);
		$criteria->compare('BBPIN',$this->BBPIN,true);
		/*$criteria->compare('Foto',$this->Foto,true);*/

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
/**
	 * Checks if the given password is correct.
	 * @param string the password to be validated
	 * @return boolean whether the password is valid
	 */
	public function validatePassword($password)
	{
		return $this->hashPassword($password,$this->Sesion)===$this->Password;
	}

	/**
	 * Generates the password hash.
	 * @param string password
	 * @param string salt
	 * @return string hash
	 */
	public function hashPassword($password,$salt)
	{
		return md5($salt.$password);
	}

	/**
	 * Generates a salt that can be used to generate a password hash.
	 * @return string the salt
	 */
	public function generateSalt()
	{
		return uniqid('',true);
	}
}