
<?php

    // get > form data
    $task           = $_POST['task-select'] ?? '';
    $name           = $_POST['full-name'] ?? '';
    $group          = $_POST['group'] ?? '';
    $email          = $_POST['email'] ?? '';
    $answer         = (float) ( $_POST['answer'] ?? '' );
    $version        = $_POST['version'] ?? '';
    $send_via_email = $_POST['send-via-email'] ?? '';

    // [ task data ]
    $answers = [
        'Triangle`s area' => 6,
        'Trangle`s perimeter' => 30,
        'Parallelepiped`s value' => 2000,
        'Average' => 4,
        'Arithmetical progression' => 10,
    ];

    $show_results = isset($_POST['submit']);

    if( $show_results ) {
        $task_title = array_keys($answers)[ $task ];
        $result = checkAnswer( $task_title , $answer );
        $result_color = ($result == 'Test passed') ? '#28DC9F' : '#f8b19c';
        $results_sent = $send_via_email ? "Results were sent on $email" : '';

        $output = <<< OUTPUT
        Full name: $name <br>
        Group: $group <br>
        Task: $task_title <br>
        Your answer: $answer <br>
        Correct answer: {$answers[ $task_title ]} <br>
        <strong style = 'color: $result_color'>Result: $result</strong>
        <br><br>
        <em>$results_sent</em>
        OUTPUT;
    }



    //@ check > user`s answer
    function checkAnswer( $task_title , $answer ) {
        global $answers;

        if( $answer == $answers[ $task_title ] ) return 'Test passed';
        else return 'Test failed';
    }

?>