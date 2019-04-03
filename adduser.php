<?php include'header.php'; ?>
<div class="">
  <form class="" action="index.html" method="post">

        <div class="uk-padding">
          <h3> adduser </h3>
          <form class="uk-grid-small" uk-grid>
            <div class="uk-width-1-2@s">
              <input class="uk-input" type="text" placeholder="name">
            </div>
            <div class="uk-width-1-2@s">
              <input class="uk-input" type="text" placeholder="email">
            </div>
            <div class="uk-width-1-1">
              <input class="uk-input" type="text" placeholder="pw">
            </div>
            <div class="uk-width-1-1">
              <input class="uk-input" type="text" placeholder="re enter pw">
            </div>
            <div class="uk-width-1-1">
                manate2
                <br>
                <label><input class="uk-checkbox" type="checkbox" checked> سويس</label>
                <label><input class="uk-checkbox" type="checkbox" checked> اربعين</label>
                <label><input class="uk-checkbox" type="checkbox" checked> بورسعيد</label>

            </div>




            <div class="uk-width-1-2">
              <button class="uk-button uk-button-default uk-width-expand" type="submit" name="button"> تأكيد </button>

            </div>
            <div class="uk-width-1-2">
              <button class="uk-button uk-button-default uk-width-expand" type="submit" name="button"> حذف </button>

            </div>

          </form>
        </div>

  </form>
</div>
<?php include'footer.php'; ?>
