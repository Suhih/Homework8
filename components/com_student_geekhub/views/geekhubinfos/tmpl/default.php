<?php
/**
 * @version     1.0.0
 * @package     com_student_geekhub
 * @copyright   © 2013. Все права защищены.
 * @license     GNU General Public License версии 2 или более поздней; Смотрите LICENSE.txt
 * @author      Yuriy <Satoru@ukr.net> - http://
 */
// no direct access
defined('_JEXEC') or die;
?>
<script type="text/javascript">
    function deleteItem(item_id){
        if(confirm("<?php echo JText::_('COM_STUDENT_GEEKHUB_DELETE_MESSAGE'); ?>")){
            document.getElementById('form-geekhubinfo-delete-' + item_id).submit();
        }
    }
</script>

<div class="items">
    <ul class="items_list">
<?php $show = false; ?>
        <?php foreach ($this->items as $item) : ?>

            
				<?php
					if($item->state == 1 || ($item->state == 0 && JFactory::getUser()->authorise('core.edit.own',' com_student_geekhub.geekhubinfo.'.$item->id))):
						$show = true;
						?>
							<li>
								<a href="<?php echo JRoute::_('index.php?option=com_student_geekhub&view=geekhubinfo&id=' . (int)$item->id); ?>"><?php echo $item->student_name; ?></a>
								<?php
									if(JFactory::getUser()->authorise('core.edit.state','com_student_geekhub.geekhubinfo.'.$item->id)):
									?>
										<a href="javascript:document.getElementById('form-geekhubinfo-state-<?php echo $item->id; ?>').submit()"><?php if($item->state == 1): echo JText::_("COM_STUDENT_GEEKHUB_UNPUBLISH_ITEM"); else: echo JText::_("COM_STUDENT_GEEKHUB_PUBLISH_ITEM"); endif; ?></a>
										<form id="form-geekhubinfo-state-<?php echo $item->id ?>" style="display:inline" action="<?php echo JRoute::_('index.php?option=com_student_geekhub&task=geekhubinfo.save'); ?>" method="post" class="form-validate" enctype="multipart/form-data">
											<input type="hidden" name="jform[id]" value="<?php echo $item->id; ?>" />
											<input type="hidden" name="jform[ordering]" value="<?php echo $item->ordering; ?>" />
											<input type="hidden" name="jform[state]" value="<?php echo (int)!((int)$item->state); ?>" />
											<input type="hidden" name="jform[checked_out]" value="<?php echo $item->checked_out; ?>" />
											<input type="hidden" name="jform[checked_out_time]" value="<?php echo $item->checked_out_time; ?>" />
											<input type="hidden" name="jform[student_foto]" value="<?php echo $item->student_foto; ?>" />
											<input type="hidden" name="jform[student_name]" value="<?php echo $item->student_name; ?>" />
											<input type="hidden" name="jform[date_of_birth]" value="<?php echo $item->date_of_birth; ?>" />
											<input type="hidden" name="jform[student_gender]" value="<?php echo $item->student_gender; ?>" />
											<input type="hidden" name="jform[student_grupe]" value="<?php echo $item->student_grupe; ?>" />
											<input type="hidden" name="jform[student_gpa]" value="<?php echo $item->student_gpa; ?>" />
											<input type="hidden" name="jform[student_number]" value="<?php echo $item->student_number; ?>" />
											<input type="hidden" name="jform[student_info]" value="<?php echo $item->student_info; ?>" />
											<input type="hidden" name="option" value="com_student_geekhub" />
											<input type="hidden" name="task" value="geekhubinfo.save" />
											<?php echo JHtml::_('form.token'); ?>
										</form>
									<?php
									endif;
									if(JFactory::getUser()->authorise('core.delete','com_student_geekhub.geekhubinfo.'.$item->id)):
									?>
										<a href="javascript:deleteItem(<?php echo $item->id; ?>);"><?php echo JText::_("COM_STUDENT_GEEKHUB_DELETE_ITEM"); ?></a>
										<form id="form-geekhubinfo-delete-<?php echo $item->id; ?>" style="display:inline" action="<?php echo JRoute::_('index.php?option=com_student_geekhub&task=geekhubinfo.remove'); ?>" method="post" class="form-validate" enctype="multipart/form-data">
											<input type="hidden" name="jform[id]" value="<?php echo $item->id; ?>" />
											<input type="hidden" name="jform[ordering]" value="<?php echo $item->ordering; ?>" />
											<input type="hidden" name="jform[state]" value="<?php echo $item->state; ?>" />
											<input type="hidden" name="jform[checked_out]" value="<?php echo $item->checked_out; ?>" />
											<input type="hidden" name="jform[checked_out_time]" value="<?php echo $item->checked_out_time; ?>" />
											<input type="hidden" name="jform[created_by]" value="<?php echo $item->created_by; ?>" />
											<input type="hidden" name="jform[student_foto]" value="<?php echo $item->student_foto; ?>" />
											<input type="hidden" name="jform[student_name]" value="<?php echo $item->student_name; ?>" />
											<input type="hidden" name="jform[date_of_birth]" value="<?php echo $item->date_of_birth; ?>" />
											<input type="hidden" name="jform[student_gender]" value="<?php echo $item->student_gender; ?>" />
											<input type="hidden" name="jform[student_grupe]" value="<?php echo $item->student_grupe; ?>" />
											<input type="hidden" name="jform[student_gpa]" value="<?php echo $item->student_gpa; ?>" />
											<input type="hidden" name="jform[student_number]" value="<?php echo $item->student_number; ?>" />
											<input type="hidden" name="jform[student_info]" value="<?php echo $item->student_info; ?>" />
											<input type="hidden" name="option" value="com_student_geekhub" />
											<input type="hidden" name="task" value="geekhubinfo.remove" />
											<?php echo JHtml::_('form.token'); ?>
										</form>
									<?php
									endif;
								?>
							</li>
						<?php endif; ?>

<?php endforeach; ?>
        <?php
        if (!$show):
            echo JText::_('COM_STUDENT_GEEKHUB_NO_ITEMS');
        endif;
        ?>
    </ul>
</div>
<?php if ($show): ?>
    <div class="pagination">
        <p class="counter">
            <?php echo $this->pagination->getPagesCounter(); ?>
        </p>
        <?php echo $this->pagination->getPagesLinks(); ?>
    </div>
<?php endif; ?>


									<?php if(JFactory::getUser()->authorise('core.create','com_student_geekhub')): ?><a href="<?php echo JRoute::_('index.php?option=com_student_geekhub&task=geekhubinfo.edit&id=0'); ?>"><?php echo JText::_("COM_STUDENT_GEEKHUB_ADD_ITEM"); ?></a>
	<?php endif; ?>