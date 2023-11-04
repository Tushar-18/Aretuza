if ($reg->save()) {
     session()->flash('succ', 'Data saved successfully');
     $email = $req->em;
     $fn = $req->fn;
     $data = ['em' => $email, 'fn' => $fn];
     Mail::send('register_template', ["data1" => $data], function ($message) use ($data) {

         $message->to($data['em'], $data['fn']);
         $message->from("travaliya519@rku.ac.in", "Tushar");
     });
 } else {
     session()->flash('err', 'error in saving data');
 }