<?php
/**
 * This file contains countdown timezone.
 *
 * @author  Tech Banker
 * @package wp-coming-soon-booster/theme/includes
 * @version 1.0.0
 */

$date                     = esc_attr( $meta_data_array['launch_date'] );
list($month, $day, $year) = explode( '/', $date );

$time                            = esc_attr( $meta_data_array['launch_time'] );
list($hours, $minutes, $seconds) = explode( ',', $time );

$date_time = $day . '-' . $month . '-' . $year . ' ' . $hours . ':' . $minutes . ':' . $seconds;

$time_stamp = strtotime( $date_time );
