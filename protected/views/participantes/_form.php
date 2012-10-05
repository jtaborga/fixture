<div class="form white">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'participantes-form',
	'enableAjaxValidation'=>false,
	'stateful'=>true,
	'method'=>'post',
	'htmlOptions' => array('enctype' => 'multipart/form-data')
)); ?>

	<p class="note"><?php echo Yii::t('app', 'Fields with '); ?><span class="required">*</span><?php echo Yii::t('app', ' are required.'); ?></p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Nombre'); ?>
		<?php echo $form->textField($model,'Nombre',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'Nombre'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'foto_pequena'); ?>
		<?php echo $form->fileField($model,'foto_pequena'); ?>
		<?php echo $form->error($model,'foto_pequena'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'foto_grande'); ?>
		<?php echo $form->fileField($model,'foto_grande'); ?>
		<?php echo $form->error($model,'foto_grande'); ?>
	</div>

	<div class="row">
		<?php /*echo $form->labelEx($model,'FechaCreacion'); ?>
		<!--php echo $form->textField($model,'FechaCreacion'); -->
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
		<?php echo $form->error($model,'FechaCreacion');*/ ?>
	</div>

	<div class="row">
		<?php /*echo $form->labelEx($model,'id_usuarioC'); ?>
		<?php echo $form->dropDownList($model,'id_usuarioC', CHtml::listData(Usuarios::model()->findAll() , 'id_usuario' , 'NombreCompleto')); ?>
		<?php echo $form->error($model,'id_usuarioC');*/ ?>
	</div>

	<div class="row">
		<?php /*echo $form->labelEx($model,'FechaModificacion'); ?>
		<!--php echo $form->textField($model,'FechaModificacion');-->
		
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
		
		<?php echo $form->error($model,'FechaModificacion');*/ ?>
	</div>

	<div class="row">
		<?php /*echo $form->labelEx($model,'id_usuarioM'); ?>
		<?php echo $form->dropDownList($model,'id_usuarioM', CHtml::listData(Usuarios::model()->findAll(), 'id_usuario', 'NombreCompleto')); ?>
		<?php echo $form->error($model,'id_usuarioM'); */?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->