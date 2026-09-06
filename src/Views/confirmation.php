<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 */
helper(['jquery3']);

register_jquery3();
?>
<script type="text/javascript">
    $(document).on('submit', 'form', function(event) {
        var confirmation = $(event.target).attr('data-confirmation');
        if (confirmation) {
            if (!confirm(confirmation)) {
                return false;
            }
        }
    });
</script>