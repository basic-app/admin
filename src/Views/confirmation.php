<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 */
helper(['admin_jquery']);

register_admin_jquery();
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