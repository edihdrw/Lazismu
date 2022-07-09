<?php

function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        redirect('auth');
    } else {

        $role_id = $ci->session->userdata('role_id');
        $query = $ci->db->get_where('user', ['role_id' => $role_id])->row_array();
        $id = $query['role_id'];

        if ($role_id != $id) {
            redirect('blocked');
        }
    }
}
