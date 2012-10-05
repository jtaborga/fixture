<?php

/**
 * This is the model class for table "eventos".
 *
 * The followings are the available columns in table 'eventos':
 * @property integer $id_evento
 * @property string $Nombre
 * @property integer $Participante1
 * @property integer $Participante2
 * @property string $Fecha
 * @property string $Estado
 * @property string $FechaCreacion
 * @property integer $id_usuarioC
 * @property string $FechaModificacion
 * @property integer $id_usuarioM
 *
 * The followings are the available model relations:
 * @property Apuestas[] $apuestases
 * @property Usuarios $idUsuarioM
 * @property Participantes $participante1
 * @property Participantes $participante2
 * @property Usuarios $idUsuarioC 
 * @property Grupos $id_grupo
 * @property Costo $id_costo
 */
class Eventos extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Eventos the static model class
	 */
	 
	public static $estados = array('1' => 'Activo', '0' => 'Inactivo');
	public $Horas;
	public $Minutos;
	public $Hours = 23;
	public $Mins = 59;
	public $HorasVence;
	public $MinutosVence;
	 
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'eventos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Nombre, Participante1, Participante2, Horas, Minutos, Fecha, FechaVencimiento, HorasVence, MinutosVence, Estado, FechaCreacion, id_usuarioC, FechaModificacion, id_usuarioM, id_costo', 'required'),
			array('Participante1, Participante2, id_usuarioC, id_usuarioM, Horas, Minutos, id_costo', 'numerical', 'integerOnly'=>true),
			array('Estado', 'length', 'max'=>1),
			/*array('Horas', 'compare', 'compararHoras', 'type'=>'numerical'),
			array('Minutos', 'compare', 'compararMinutos', 'type'=>'numerical'),*/
			array('Horas','compare','compareAttribute'=>'Hours','operator'=>'<=','message'=>'La hora no debe exceder el valor 23.'),
			array('Minutos','compare','compareAttribute'=>'Mins','operator'=>'<=','message'=>'Los minutos no deben exceder el valor 59'),
			array('HorasVence','compare','compareAttribute'=>'Hours','operator'=>'<=','message'=>'La hora no debe exceder el valor 23.'),
			array('MinutosVence','compare','compareAttribute'=>'Mins','operator'=>'<=','message'=>'Los minutos no deben exceder el valor 59'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_evento, Nombre, Participante1, Participante2, Fecha, Estado', 'safe', 'on'=>'search'),
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
			'apuestases' => array(self::HAS_MANY, 'Apuestas', 'id_evento'),
			'idUsuarioM' => array(self::BELONGS_TO, 'Usuarios', 'id_usuarioM'),
			'participante1' => array(self::BELONGS_TO, 'Participantes', 'Participante1'),
			'participante2' => array(self::BELONGS_TO, 'Participantes', 'Participante2'),
			'idUsuarioC' => array(self::BELONGS_TO, 'Usuarios', 'id_usuarioC'),
			'id_costo' => array(self::BELONGS_TO, 'Costos', 'id_costo'),
		);
	}
	
	public static function getEstado($key=null)
	{
		if($key !== null)
			return self::$estados[$key];
		else
			return self::$estados;
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_evento' => 'ID Evento',
			'Nombre' => 'Nombre',
			'Participante1' => 'Equipo 1',
			'Participante2' => 'Equipo 2',
			'Fecha' => 'Fecha',
			'Estado' => 'Estado',
			'Horas' => 'Hora',
			'Minutos' => 'Minuto',
			'FechaVencimiento' => 'Fecha de Caducidad',
			'HorasVence' => 'Hora Caducidad',
			'MinutosVence' => 'Minutos Caducidad',
			'FechaCreacion' => 'Fecha Creacion',
			'id_usuarioC' => 'Usuario Creador',
			'FechaModificacion' => 'Fecha Modificacion',
			'id_usuarioM' => 'Usuario Modificador',
			'id_costo'=> 'Costo Apuesta'
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

		$criteria->compare('id_evento',$this->id_evento);
		$criteria->compare('Nombre',$this->Nombre);
		$criteria->compare('Participante1',$this->Participante1);
		$criteria->compare('Participante2',$this->Participante2);
		$criteria->compare('Fecha',$this->Fecha,true);
		$criteria->compare('FechaVencimiento',$this->Fecha,true);
		$criteria->compare('Estado',$this->Estado,true);
		$criteria->compare('FechaCreacion',$this->FechaCreacion,true);
		$criteria->compare('id_usuarioC',$this->id_usuarioC);
		$criteria->compare('FechaModificacion',$this->FechaModificacion,true);
		$criteria->compare('id_usuarioM',$this->id_usuarioM);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function compararHoras($attributes, $params)
	{
		if(!empty($this->$attributes['Horas']))
		{
			if($this->$attributes['Horas'] < 0 OR $attributes['Horas'] > 23)
				$this->addError($attributes, 'La hora no puede ser menor a cero o mayor que 23');
		}
	}
	
	public function compararMinutos($attributes, $params)
	{
		if(!empty($this->$attributes['Minutos']))
		{
			if($this->$attributes['Minutos'] < 0 OR $attributes['Minutos'] > 59)
				$this->addError($attributes, 'Los minutos no pueden ser menores a cero o mayores que 59');
		}
	}
}