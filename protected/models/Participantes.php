<?php

/**
 * This is the model class for table "participantes".
 *
 * The followings are the available columns in table 'participantes':
 * @property integer $id_participante
 * @property string $Nombre
 * @property string $FechaCreacion
 * @property integer $id_usuarioC
 * @property string $FechaModificacion
 * @property integer $id_usuarioM
 *
 * The followings are the available model relations:
 * @property Eventos[] $eventoses
 * @property Eventos[] $eventoses1
 * @property Usuarios $idUsuarioM
 * @property Usuarios $idUsuarioC
 */
class participantes extends CActiveRecord
{
	public $Foto_pequena;
	public $Foto_grande;
	
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return participantes the static model class
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
		return 'participantes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Nombre, FechaCreacion, id_usuarioC, FechaModificacion, id_usuarioM', 'required'),
			array('id_usuarioC, id_usuarioM', 'numerical', 'integerOnly'=>true),
			array('Nombre', 'length', 'max'=>100),
			array('foto_pequena', 'file', 
			       'types'=>'jpg, gif, png, bmp, jpeg',
			       'maxSize'=>1024 * 1024 * 10, // 10MB
			       'tooLarge'=>'The file was larger than 10MB. Please upload a smaller file.',
			       'allowEmpty' => true
			      ),
			array('foto_grande', 'file', 
			       'types'=>'jpg, gif, png, bmp, jpeg',
			       'maxSize'=>1024 * 1024 * 10, // 10MB
			       'tooLarge'=>'The file was larger than 10MB. Please upload a smaller file.',
			       'allowEmpty' => true
			      ),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_participante, Nombre', 'safe', 'on'=>'search'),
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
			'eventoses' => array(self::HAS_MANY, 'Eventos', 'Participante1'),
			'eventoses1' => array(self::HAS_MANY, 'Eventos', 'Participante2'),
			'idUsuarioM' => array(self::BELONGS_TO, 'Usuarios', 'id_usuarioM'),
			'idUsuarioC' => array(self::BELONGS_TO, 'Usuarios', 'id_usuarioC'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_participante' => 'Participante',
			'Nombre' => 'Nombre',
			'FechaCreacion' => 'Fecha Creacion',
			'id_usuarioC' => 'Id Usuario C',
			'FechaModificacion' => 'Fecha Modificacion',
			'id_usuarioM' => 'Usuario Modificador',
			'id_usuarioC' => 'Usuario Creador'
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

		$criteria->compare('id_participante',$this->id_participante);
		$criteria->compare('Nombre',$this->Nombre,true);
		/*$criteria->compare('FechaCreacion',$this->FechaCreacion,true);
		$criteria->compare('id_usuarioC',$this->id_usuarioC);
		$criteria->compare('FechaModificacion',$this->FechaModificacion,true);
		$criteria->compare('id_usuarioM',$this->id_usuarioM);*/

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}