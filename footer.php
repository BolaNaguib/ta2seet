</div>
</div>
<div class="footer">

</div>


<!-- Add new maincategory modal -->
<?php include'addmaincategory.php'; ?>

<!-- Add new subcategory modal -->
<?php include'addsubcategory.php'; ?>


<div id="new_installment" class="uk-flex-top" uk-modal>
  <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">

    <button class="uk-modal-close-default" type="button" uk-close></button>
    <div class="uk-padding">
      <h3> قسط جديد </h3>
      <form class="uk-grid-small" uk-grid>
        <div class="uk-width-1-2@s">
          <input class="uk-input" type="text" placeholder="التاريخ">
        </div>
        <div class="uk-width-1-2@s">
          <input class="uk-input" type="text" placeholder="إسم العميل">
        </div>
        <div class="uk-width-1-1">
          <input class="uk-input" type="text" placeholder="إسم المنتج">
        </div>
        <div class="uk-width-1-1">
          <input class="uk-input" type="date" data-uk-datepicker="{format:'DD.MM.YYYY'}" placeholder="ميعاد القسط">
        </div>
        <div class="uk-width-1-2@s">
          <input class="uk-input" type="number" placeholder="السعر">
        </div>
        <div class="uk-width-1-2@s">
          <input class="uk-input" type="text" placeholder="الفائدة">
        </div>
        <div class="uk-width-1-1">
          <input class="uk-input" type="text" placeholder="الإجمالي">
        </div>
        <div class="uk-width-1-1">
          <input class="uk-input" type="textarea" placeholder="ملاحظات">
        </div>
        <div class="uk-width-1-2">
          <button class="uk-button uk-button-default uk-width-expand" type="submit" name="button"> تأكيد </button>

        </div>
        <div class="uk-width-1-2">
          <button class="uk-button uk-button-default uk-width-expand" type="submit" name="button"> حذف </button>

        </div>

      </form>
    </div>

  </div>
</div>

<div id="refund" class="uk-flex-top" uk-modal>
  <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">

    <button class="uk-modal-close-default" type="button" uk-close></button>
    <div class="uk-padding">
      <h3> تسجيل مرتجع </h3>
      <form class="uk-grid-small" uk-grid>
        <div class="uk-width-1-2@s">
          <input class="uk-input" type="text" placeholder="التاريخ">
        </div>
        <div class="uk-width-1-2@s">
          <input class="uk-input" type="text" placeholder="إسم العميل">
        </div>
        <div class="uk-width-1-2@s">
          <input class="uk-input" type="text" placeholder="المبلغ">
        </div>
        <div class="uk-width-1-2@s">
          <input class="uk-input" type="text" placeholder="إسم المنتج">
        </div>

        <div class="uk-width-1-1">
          <input class="uk-input" type="textarea" placeholder="ملاحظات">
        </div>
        <div class="uk-width-1-2">
          <button class="uk-button uk-button-default uk-width-expand" type="submit" name="button"> تأكيد </button>

        </div>
        <div class="uk-width-1-2">
          <button class="uk-button uk-button-default uk-width-expand" type="submit" name="button"> حذف </button>

        </div>

      </form>
    </div>

  </div>
</div>


<div id="pay_installment" class="uk-flex-top" uk-modal>
  <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">

    <button class="uk-modal-close-default" type="button" uk-close></button>
    <div class="uk-padding">
      <h3> دفع قسط </h3>
      <form class="uk-grid-small" uk-grid>
        <div class="uk-width-1-2@s">
          <input class="uk-input" type="text" placeholder="التاريخ">
        </div>
        <div class="uk-width-1-1@s">
          <input class="uk-input" type="text" placeholder="إسم العميل">
        </div>
        <div class="uk-width-1-1@s">
          <input class="uk-input" type="text" placeholder="المبلغ">
        </div>


        <div class="uk-width-1-1">
          <input class="uk-input" type="textarea" placeholder="ملاحظات">
        </div>
        <div class="uk-width-1-2">
          <button class="uk-button uk-button-default uk-width-expand" type="submit" name="button"> تأكيد </button>

        </div>
        <div class="uk-width-1-2">
          <button class="uk-button uk-button-default uk-width-expand" type="submit" name="button"> حذف </button>

        </div>

      </form>
    </div>

  </div>
</div>


</body>

</html>
