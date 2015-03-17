<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'dropbox-create-post-from',
    'action' => Yii::app()->createUrl('//dropbox/index/edit', array(
        'id' => $id
    ))
));
?>

<div class="form-group">
    <span id="dropbox-open_<?php echo $id;?>" class="pull-right"><i class="fa fa-folder-open"></i></span>
    <ul class="tag_input" id="dropbox_file_tags" style="margin-right:20px;" >
        <li>
            <?php echo $form->textField($model, 'dropboxFileId', array('id' => 'dropbox_files_list_'.$id, 'placeholder' => Yii::t('DropboxModule.views_dropbox_index', 'Select files from dropbox'), 'class'=> 'tag_input_field')); ?>
        </li>
        <?php
        $this->widget('application.modules.dropbox.widgets.DropboxFileListerWidget', array(
            'inputId' => 'dropbox_files_list_'.$id,
            'model' => $model,
            'attribute' => 'dropboxFileId',
            'openIcon' => 'dropbox-open_'.$id
        ));
        ?>
    </ul>

</div>


</div>
<div class="form-group">
    <?php  echo $form->labelEx($model, 'message'); ?>
    <?php echo $form->textArea($model, 'message', array('class' => 'form-control', 'placeholder' => Yii::t('DropboxModule.views_dropbox_index', 'Describe your images'))); ?>
    <?php echo $form->error($model, 'message'); ?>
</div>

<div>
    <?php //echo CHtml::submitButton( Yii::t('DropboxModule.views_dropbox_index', 'Submit'));?>
    
    <?php echo HHtml::ajaxButton('Save', array('//dropbox/index/edit', 'id' => $id), array(
        'type' => 'POST',
        'success' => 'function(html){ $("#dropbox-post-' . $id . '").replaceWith(html); }',
            ), array('class' => 'btn btn-primary', 'id' => 'post_edit_post_' . $id));
        
    ?>
</div>

<?php $this->endWidget(); ?>