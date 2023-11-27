<?php 

function custom_database_page() { //replace "custom_database_page" with your admin panel menu callback function
    global $wpdb;

    $tablename = $wpdb->prefix . 'user_data'; //replace "user_data" with your existing table

    $column_names = $wpdb->get_col("DESC $tablename", 0);
    $data = $wpdb->get_results("SELECT * FROM $tablename", ARRAY_A);

    ?>
    <div class="wrap">
        <h1 class="wp-heading-inline">Custom Database Table</h1>
        <table class="wp-list-table widefat fixed striped">
            <thead>
                <tr>
                    <?php
                    foreach ($column_names as $column_name) {
                        echo '<th>' . $column_name . '</th>';
                    }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
               foreach ($data as $row) {
                echo '<tr>';
                foreach ($column_names as $column_name) {
                    echo '<td>' . esc_html($row[$column_name]) . '</td>';
                }
                echo '</tr>';
            }
                ?>
            </tbody>
        </table>
    </div>
    <?php
}


