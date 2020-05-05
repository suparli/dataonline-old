<?php

function is_logged_in()
{

	$ci = get_instance();

	if (!$ci->session->userdata('email')) {
		redirect('auth');
	} else {
		$rule_id = $ci->session->userdata('rule_id');
		$menu = $ci->uri->segment(1);

		// var_dump($menu);
		// die;
		$queryMenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();
		$menu_id = $queryMenu['id'];

		$userAccess = $ci->db->get_where('user_access_menu', [
			'rule_id' => $rule_id,
			'menu_id' => $menu_id
		]);


		if ($userAccess->num_rows() < 1)
			redirect('auth/blocked');
	}
}

// function is_token()
// {
// 	$ci = get_instance();

// 	if ()
// }

function counter()
{
	$ci = get_instance();

	$get = $ci->db->get_where('counter')->result_array();
	foreach ($get as $g) {
		$hasil = $g['hitung'];
	}
	$total = $hasil + 1;

	$data = array(
		'hitung' => $total
	);

	$ci->db->update('counter', $data);
}




function check_access($rule_id, $menu_id)
{
	$ci = get_instance();

	$ci->db->where('rule_id', $rule_id);
	$ci->db->where('menu_id', $menu_id);
	$result = $ci->db->get('user_access_menu');

	if ($result->num_rows() > 0) {
		return "checked = 'checked'";
	}
}

function check_user_access($id_user, $id_aws)
{
	$ci = get_instance();

	$ci->db->where('id_user', $id_user);
	$ci->db->where('id_aws', $id_aws);
	$result = $ci->db->get('user_access_data');

	if ($result->num_rows() > 0) {
		return "checked = 'checked'";
	}
}
