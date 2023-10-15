<?php
  include('../includes/autoload.php');    
  require_once('../templates/admin/header.php');   
?>
        <header class="py-10">
          <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold tracking-tight text-white">
              Transactions of name
            </h1>
          </div>
        </header>
      </div>
      <?php 
        $c_email = $_GET['email']; 
        $transactions = new Admin();   
        $transaction = $transactions->detailTransaction($c_email);    
      ?>
      <main class="-mt-32">
        <div class="mx-auto max-w-7xl px-4 pb-12 sm:px-6 lg:px-8">
          <div class="bg-white rounded-lg py-8">
            <!-- List of All The Transactions --> 
            <div class="px-4 sm:px-6 lg:px-8">
              <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto"> 
                  <p class="mt-2 text-sm text-gray-700">       
                    List of transactions made by <?= $c_email?>    
                  </p>
                </div>
              </div>
              <div class="mt-8 flow-root"> 
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                  <div
                    class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <table class="min-w-full divide-y divide-gray-300">
                      <thead>
                        <tr>
                          <th
                            scope="col" 
                            class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                            Receiver Name
                          </th>
                          <th
                            scope="col" 
                            class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                            Email
                          </th>
                          <th
                            scope="col"
                            class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                            Amount
                          </th>
                          <th
                            scope="col"
                            class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                            Date
                          </th>
                        </tr>
                      </thead>
                      <tbody class="divide-y divide-gray-200 bg-white">
                         
                        <tr>
                          <td
                            class="whitespace-nowrap py-4 pl-4 pr-3 text-sm text-gray-800 sm:pl-0">
                            <?php  
                              if (is_array($transaction)) { 
                                  // The $transaction variable is an array, you can access its elements safely.
                                  $user_email = $transaction['r_email'];  
                                  $receiver_names = new User();               
                                  $receiver_name = $receiver_names->showUser($user_email);  
                                  echo $receiver_name['f_name'] . " " . $receiver_name['l_name']; 
                              } else { 
                                  // $transaction is not an array, it's likely 0 or false.
                                  echo "No result found.";
                              }
                                 
                            ?>
                          </td>
                          <td
                            class="whitespace-nowrap py-4 pl-4 pr-3 text-sm text-gray-500 sm:pl-0">
                            <?php  
                            if (is_array($transaction)) {
                                // The $transaction variable is an array, you can access its elements safely.
                                echo $transaction['r_email'];
                            } else { 
                                // $transaction is not an array, it's likely 0 or false.
                                echo "No result found.";
                            }   
                            ?>
                          </td>
                          <td
                            class="whitespace-nowrap px-2 py-4 text-sm font-medium text-emerald-600">
                            <?php  
                            if (is_array($transaction)) {
                                // The $transaction variable is an array, you can access its elements safely.
                                echo $transaction['r_amount'];
                            } else { 
                                // $transaction is not an array, it's likely 0 or false.
                                echo "No result found.";
                            }   
                            ?> 
                          </td>
                          <td 
                            class="whitespace-nowrap px-2 py-4 text-sm text-gray-500">
                            <?php 
                            if (is_array($transaction)) { 
                                // The $transaction variable is an array, you can access its elements safely.
                                echo $transaction['t_time']; 
                            } else { 
                                // $transaction is not an array, it's likely 0 or false.
                                echo "No result found.";
                            }   
                            ?> 
                          </td>
                        </tr>
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
  </body>
</html>
