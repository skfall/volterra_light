<div class="recall_modal" data-remodal-id="recall_modal" class="remodal">
  <div class="close_recall waves-effect" data-remodal-action="close"></div>
  <p class="modal_sub_title">Volterra Energy Group</p>
  <div class="modal_header">
    {{ $t->find(34)->text }}
  </div>
  <div class="cont_sep"></div>
  <div class="clear space15"></div>
  <form action="#" id="recall_form" class="volterra_form" method="POST">
    <input type="hidden" name="action" value="contact_form">
    <input type="hidden" name="lang" value="<?= LANG ?>">
    <div class="input-field col s12">
      <input id="c_name" type="text" name="name">
      <label for="c_name" class="">{{ $t->find(35)->text }}</label>
    </div>

    <div class="input-field col s12">
      <input id="c_email" type="email" name="email">
      <label for="c_email" class="">{{ $t->find(36)->text }}</label>
    </div>

    <div class="input-field col s12">
      <input id="c_phone" type="text" name="phone" class="mask">
      <label for="c_phone" class="">{{ $t->find(37)->text }}</label>
    </div>

    <div class="input-field col s12">
      <textarea id="c_message" class="materialize-textarea" name="message"></textarea>
      <label for="c_message">{{ $t->find(38)->text }}</label>
    </div>

    <div class="input-field col s12">
      <a href="javascript:void(0);" onclick="network.modalForm();" class="hoverable waves-effect waves-light prog_link valign-wrapper waves-nav">{{ $t->find(39)->text }}</a>
    </div>

    <p class="recall_response tac"></p>

  </form>
</div>