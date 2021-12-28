<?php

require_once "connect.php";

class LaundryController
{
    /**
     * 
     *  function to get all data
     *
     * @return void
     */
    public function index()
    {
        global $conn;
        $query = "SELECT * FROM tbl_laundry";
        $data = array();
        $result = $conn->query($query);
        while ($row = mysqli_fetch_object($result)) {
            $data[] = $row;
        }
        $response = array(
            'status' => 1,
            'message' => 'Success get all laundry',
            'data' => $data
        );
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    /**
     *  insert data
     */
    public function create()
    {
        global $conn;
        $validation = array(
            'id' => '',
            'name' => '',
            'address' => '',
            'phone' => '',
        );
        $check = count(array_intersect_key($_POST, $validation));

        if ($check == count($validation)) {
            $query = "INSERT INTO tbl_laundry VALUES (null,'$_POST[name]','$_POST[address]','$_POST[phone]')";
            $result = $conn->query($query);

            //check
            if ($result) {
                $response = array(
                    'status' => 1,
                    'message' => 'Success add new data'
                );
            } else {
                $response = array(
                    'status' => 0,
                    'message' => 'Failed add new data'
                );
            }
        } else {
            $response = array(
                'status' => 0,
                'message' => 'Parameter do not match'
            );
        }

        header('Content-type: application/json');
        echo json_encode($response);
    }
    /**
     * 
     * edit data
     */
    public function edit($id = 0)
    {
        global $conn;

        $query = "SELECT * FROM tbl_laundry WHERE id='$id' LIMIT 1";
        $data = array();
        $result = $conn->query($query);

        while ($row = mysqli_fetch_object($result)) {
            $data[] = $row;
        }

        $response = array(
            'status' => 1,
            'message' => 'Get user laundry successfuly',
            'data' => $data
        );

        header('Content-type: application/json');
        echo json_encode($response);
    }

    /**
     * 
     * update data
     */
    public function update($id)
    {
        global $conn;
        $validation = array(
            'id' => '',
            'name' => '',
            'address' => '',
            'phone' => '',
        );
        $check = count(array_intersect_key($_POST, $validation));

        if ($check == count($validation)) {
            $query = "UPDATE tbl_laundry SET name='$_POST[name]', address='$_POST[address]', phone='$_POST[phone]' WHERE id='$id'";
            $result = $conn->query($query);

            //check
            if ($result) {
                $response = array(
                    'status' => 1,
                    'message' => 'Success update data'
                );
            } else {
                $response = array(
                    'status' => 0,
                    'message' => 'Failed update data'
                );
            }
        } else {
            $response = array(
                'status' => 0,
                'message' => 'Parameter do not match'
            );
        }

        header('Content-type: application/json');
        echo json_encode($response);
    }

    /**
     * delete data
     */
    public function destroy($id)
    {
        global $conn;
        $query = "DELETE FROM tbl_laundry WHERE id='$id'";
        if (mysqli_query($conn, $query)) {
            $response = array(
                'status' => 1,
                'message' => 'Deleted data laundry successfully'
            );
        } else {
            $response = array(
                'status' => 0,
                'message' => 'Deleted data laundry failed'
            );
        }
        header('Content-type: application/json');
        echo json_encode($response);
    }
}
