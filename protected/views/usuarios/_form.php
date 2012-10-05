<div class="form blanco">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'usuarios-form',
	'enableAjaxValidation'=>false,
	'stateful'=>true,
	'method'=>'post',
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="note"><?php echo Yii::t('app', 'Fields with '); ?><span class="required">*</span><?php echo Yii::t('app', ' are required.'); ?></p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Nombre'); ?>
		<?php echo $form->textField($model,'Nombre',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'Nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Paterno'); ?>
		<?php echo $form->textField($model,'Paterno',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'Paterno'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Materno'); ?>
		<?php echo $form->textField($model,'Materno',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'Materno'); ?>
	</div>

	<?php
	/*
	<div class="row">
		<?php echo $form->labelEx($model,'NombreCompleto'); ?>
		<?php echo $form->textField($model,'NombreCompleto',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'NombreCompleto'); ?>
	</div>
	*/
	?>
	
	<div class="row">
		<?php echo $form->labelEx($model,'Telefono'); ?>
		<?php echo $form->textField($model,'Telefono'); ?>
		<?php echo $form->error($model,'Telefono'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Correo'); ?>
		<?php echo $form->textField($model,'Correo',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'Correo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Foto'); ?>
		<?php echo $form->fileField($model,'Foto'); ?>
		<?php echo $form->error($model,'Foto'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'NombreUsuario'); ?>
		<?php echo $form->textField($model,'NombreUsuario',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'NombreUsuario'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'Password'); ?>
		<?php echo $form->passwordField($model,'Password',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'Password'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'Ocupacion'); ?>
		<?php echo $form->textField($model,'Ocupacion',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'Ocupacion'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'CiudadOrigen'); ?>
		<?php echo $form->textField($model,'CiudadOrigen',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'CiudadOrigen'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'BBPIN'); ?>
		<?php echo $form->textField($model,'BBPIN',array('size'=>60,'maxlength'=>12)); ?>
		<?php echo $form->error($model,'BBPIN'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Save'), array('class'=>'vinculowhite')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->