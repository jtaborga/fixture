
<div class="form white">

<?php
	$form=$this->beginWidget('CActiveForm', array(
	'id'=>'apuestas-form',
	'enableAjaxValidation'=>false,
	)); 
?>

	<br />
	<?php echo $form->errorSummary($model); ?>
	<?php 
	/*<div class="row">
		<?php echo $form->labelEx($model,'id_usuario'); ?>
		<?php echo $form->dropDownList($model,'id_usuario', CHtml::listData(Usuarios::model()->findAll(), 'id_usuario', 'NombreCompleto')); ?>
		<?php echo $form->error($model,'id_usuario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_evento'); ?>
		<?php echo $form->dropDownList($model,'id_evento', CHtml::listData(Eventos::model()->findAll(), 'id_evento', 'Nombre'), array('empty'=>'Seleccione un evento')); ?>
		<?php echo $form->error($model,'id_evento'); ?>
	</div>
	*/
	?>
	<div class="row">
		<div><b><?php echo Participantes::model()->findByPk(Eventos::model()->findByPk($model->id_evento)->Participante1)->Nombre; ?></b></div>
		<?php /*echo $form->textField($model,'Marcador1'); */ ?>
		<?php $this->widget('CMaskedTextField', array(
                            'model' => $model,
                            'attribute' => 'Marcador1',
                            'mask' => '9',
                            'htmlOptions' => array('size' => 16)
                            )); ?>
		<?php echo $form->error($model,'Marcador1'); ?>
	</div>

	<div class="row">
		<div><b><?php echo Participantes::model()->findByPk(Eventos::model()->findByPk($model->id_evento)->Participante2)->Nombre; ?></b></div>
		<?php /*echo $form->textField($model,'Marcador2');*/ ?>
		<?php $this->widget('CMaskedTextField', array(
                            'model' => $model,
                            'attribute' => 'Marcador2',
                            'mask' => '9',
                            'htmlOptions' => array('size' => 16)
                            )); ?>
		<?php echo $form->error($model,'Marcador2'); ?>
	</div>
	
	<?php 
	/*
	<div class="row">
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
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'FechaLimite'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker',
							array('model' => $model,
								  'attribute' => 'FechaLimite',
								  'language' => 'es',
								  'options' => array(
								  'dateFormat' => 'yy-mm-dd',
								  'constrainInput' => 'false',
								  'duration' => 'fast',
								  'showAnim' => 'slide')
								  )
							);
		?>
		<?php echo $form->error($model,'FechaLimite'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'Estado'); ?>
		<?php echo $form->dropDownList($model,'Estado', array('1'=>'Activo','0'=>'Inactivo')); ?>
		<?php echo $form->error($model,'Estado'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'FechaCreacion'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker',
							array('model' => $model,
								  'attribute' => 'FechaCreacion',
								  'language' => 'es',
								  'options' => array(
								  'dateFormat' => 'yy-mm-dd',
								  'constrainInput' => 'false',
								  'duration' => 'fast',
								  'showAnim' => 'slide')
								  )
							);
		?>
		<?php echo $form->error($model,'FechaCreacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_usuarioC'); ?>
		<?php echo $form->dropDownList($model,'id_usuarioC', CHtml::listData(Usuarios::model()->findAll(), 'id_usuario', 'NombreCompleto')); ?>
		<?php echo $form->error($model,'id_usuarioC'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'FechaModificacion'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker',
							array('model' => $model,
								  'attribute' => 'FechaModificacion',
								  'language' => 'es',
								  'options' => array(
								  'dateFormat' => 'yy-mm-dd',
								  'constrainInput' => 'false',
								  'duration' => 'fast',
								  'showAnim' => 'slide')
								  )
							);
		?>
		<?php echo $form->error($model,'FechaModificacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_usuarioM'); ?>
		<?php echo $form->dropDownList($model,'id_usuarioM', CHtml::listData(Usuarios::model()->findAll(), 'id_usuario', 'NombreCompleto')); ?>
		<?php echo $form->error($model,'id_usuarioM'); ?>
	</div>
	*/
	?>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Save'), array('class'=>'vinculowhite')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
