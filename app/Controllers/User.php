<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Product_model;
use CodeIgniter\RESTful\ResourceController;
use App\Models\UserModel;

class User extends ResourceController
{
    public function myForm()
    {
        if ($this->request->getMethod() == "post") {

            $file = $this->request->getFile("profile_image");

            $file_type = $file->getClientMimeType();

            $valid_file_types = array("image/png", "image/jpeg", "image/jpg");

            $session = session();

            if (in_array($file_type, $valid_file_types)) {

                $profile_image = $file->getName();
              
              	// We can also use it like this. Automatically move function place the default image name into specified location.
                // Second value will be more beneficiary when we want to give a different name to the uploaded file.
                // $file->move("images"); 

                if ($file->move("assets/img", $profile_image)) {

                    $userModel = new UserModel();

                    $data = [
                        "name" => $this->request->getVar("name"),
                        "email" => $this->request->getVar("email"),
                        "phone_no" => $this->request->getVar("phone_no"),
                        "profile_image" => "/img/" . $profile_image,
                    ];

                    if($userModel->insert($data)){

                        $session->setFlashdata("success", "Data saved successfully");
                    }else{

                        $session->setFlashdata("error", "Failed to save data");
                    }
                } else {
                    $session->setFlashdata("error", "Failed to move file");
                }
            } else {
                // invalid file type
                $session->setFlashdata("error", "Invalid file type selected");
            }

            return redirect()->to(base_url());

        }
        
        return view("mantenimientos/my-form");
    }
}
