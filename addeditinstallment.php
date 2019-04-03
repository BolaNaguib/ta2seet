
<?php include'header.php'; ?>
<div class="uk-flex-top" >

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
<?php include'footer.php'; ?>
