(function ($) {
  'use strict';

  /**
   * Shows spinner on form submit
   * @return {undefined}
   */
  var showSpinner = function () {
    $('form').submit(function () {
      $(this).find('.spinner').addClass('is-active');
    });
  };

  /**
   * Is active check
   * @return {undefined}
   */
  var isActiveMk = function () {
      $('#email-keep-is-active').change(function () {
          var value = $(this).val();
          var child_nodes = $('.email-keep-keep-options, .email-keep-subject-keywords');
          if ( value === 'no' ){
              child_nodes.hide();
          } else {
              child_nodes.show();
              $('#email-keep-keep-options').change();
          }
      }).change();
  };

    /**
     * Is active check
     * @return {undefined}
     */
    var optionsToggleMk = function () {
        $('#email-keep-keep-options').change(function () {
            var value = $(this).val();
            var child_nodes = $('.email-keep-subject-keywords');
            if ( value === 'all'){
                child_nodes.hide();
            } else {
                child_nodes.show();
            }
        }).change();
    };

    /**
     * Click to check all
     * @return {undefined}
     */
    var checkAllMk = function () {
        $("#check-all").click(function(){
            $('input:checkbox').not(this).prop('checked', this.checked);
        });
    };

  $(document).ready(function () {
    showSpinner();
    optionsToggleMk();
    isActiveMk();
    checkAllMk();
  });

})(jQuery);
