<?php
get_header('employee');


$template_choice = get_field('template_choice');




if ($template_choice == 'petrol') {

    get_template_part('single-employee_card-new');
} else {

    get_template_part('single-employee_card-default');
}

get_footer('employee');
?>