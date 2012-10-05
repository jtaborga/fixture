<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'resultados-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row blanco">
		<?php /*<php echo $form->labelEx($model,'id_evento'); ?>
		<php echo $form->dropDownList($model, 'id_evento', CHtml::listData(Eventos::model()->findAll('Estado = 1'), 'id_evento', 'Nombre')); ?>
		<php echo $form->error($model,'id_evento'); ?>*/ ?>
	</div>

	<div class="row blanco">
		<div class="title">
		<?php 
			$numero_id = 0;
			
			if(isset($_GET['evento']))
			{
				$numero_id = $_GET['evento'];
				$model->id_evento = $numero_id;
				echo '<br />';
				echo $form->labelEx($model,'id_evento');
				echo $form->textField($model,'id_evento', array('class'=>'novisible'));
				echo '<div class="title">'.Eventos::model()->findByPk($numero_id)->Nombre.'</div>';
			} 
		?>
		</div>
		<?php 
			$Equipo1 = Participantes::model()->findByPk(Eventos::model()->findByPk($numero_id)->Participante1)->Nombre;
			echo $form->labelEx($model, CHtml::decode(htmlentities($Equipo1))); 
		?>
		<?php $this->widget('CMaskedTextField', array(
                            'model' => $model,
                            'attribute' => 'Marcador1',
                            'mask' => '9',
                            'htmlOptions' => array('size' => 16)
                            )); ?>
		<?php echo $form->error($model,'Marcador1'); ?>
	</div>

	<div class="row blanco">
		<?php 
			$Equipo2 = Participantes::model()->findByPk(Eventos::model()->findByPk($numero_id)->Participante2)->Nombre;
			echo $form->labelEx($model, htmlentities($Equipo2));
		?>
		<?php $this->widget('CMaskedTextField', array(
                            'model' => $model,
                            'attribute' => 'Marcador2',
                            'mask' => '9',
                            'htmlOptions' => array('size' => 16)
                            )); ?>
		<?php echo $form->error($model,'Marcador2'); ?>
	</div>
	<?php /*
	<div class="row blanco">
		<?php echo $form->labelEx($model,'FechaRegistro'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker',
						array('model' => $model,
								  'attribute' => 'FechaRegistro',
								  'language' => 'es',
								  'options' => array(
								  'dateFormat' => 'yy-mm-dd',
								  'constrainInput' => 'false',
								  'duration' => 'fast',
								  'showAnim' => 'slide')
								  )
							);
		?>
		<?php echo $form->error($model,'FechaRegistro'); ?>
	</div>*/
	?>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Save'), array('class' => 'vinculowhite')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->