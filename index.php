
<?php

    require('checkout.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel = "stylesheet" href = "styles/css/Normalize.css">
    <link rel="stylesheet" href="styles/css/styles.css">

    <title>Multiplication table.</title>
</head>
<body class = 'preload'>

    <!-- =[ PRELOADER ]= -->
    <div id = "preloader"></div>
    <script>
        let preloader = document.getElementById('preloader');

        window.addEventListener('load', () => {
            setTimeout(() => {
                preloader.classList.add('hidden');
                document.body.className = 'loaded';
            }, 1000);
        });
    </script>

    
    <!-- [ NAVBAR ] -->
    <nav>
        <button class = 'ico menu'>
            <svg class="icon">
                <use xlink:href="imgs/icons.svg#ico-menu"></use>
            </svg>
        </button>

        <h1 class = 'logo'>Math test.</h1>

        <button class = 'ico enter'>
            <svg class="icon">
                <use xlink:href="imgs/icons.svg#ico-enter"></use>
            </svg>
            enter
        </button>
        
    </nav>


    <!-- [ MAIN ] -->
    <main>

        <!-- [ content ] -->
        <div class = 'content'>

           <form action = 'index.php' method = 'POST' class = 'form' <?= ($show_results ?? null) ? 'hidden' : '' ?>>

                <div class="task">
                    <h3 class = 'task-title'>Your task:</h3>
                    <span id = 'task-description'>
                        Find triangle`s area.
                    </span>
                    <h5 class="task-inputs-title">Inputs:</h5>
                    <ul id="task-inputs">
                        <li>a = 3</li>
                        <li>b = 4</li>
                        <li>c = 5</li>
                    </ul>
                </div>

                <label class = 'centered' for="task-select">Select task:</label>
                <select name="task-select" id="task-select" onchange="setTask()" required>
                    <option value="0" selected>Triangle`s area</option>
                    <option value="1">Trangle`s perimeter</option>
                    <option value="2">Parallelepiped`s value</option>
                    <option value="3">Average</option>
                    <option value="4">Arithmetical progression</option>
                </select>


                <label for="full-name">Full name:</label>
                <input type="text" name = 'full-name' autocomplete = 'off' placeholder = 'full name ...'>

                <label for="group">Group number:</label>
                <input type="text" name = 'group' autocomplete = 'off' placeholder = 'group number ...'>

                <label for="email">Email:</label>
                <input type="text" name = 'email' autocomplete = 'off' placeholder = 'email ...'>

                <label for="answer">Your answer:</label>
                <input type="text" name = 'answer' autocomplete = 'off' placeholder = 'your answer ...'>

                <label for="version">Select output version:</label>
                <select class = 'select-wide' name="version" id="version" required>
                    <option value="v-browser" selected>Preview in browser</option>
                    <option value="v-print">Print version</option>
                </select>

                <div class = 'checkbox'>
                    <input name = 'send-via-email' type="checkbox">
                    <label class = 'select-inline' for="send-via-email">Send results via email</label>
                </div>

                <input type="submit" name = 'submit' value = 'check results'>

            </form>

            <div class = 'results' <?= !($show_results ?? null) ? 'hidden' : '' ?>>
                <p>
                    <h4>Results:</h4>
                    <?= $output ?? '' ?>
                </p>
                <a href = 'index.php'>Try again</a>
            </div>


        </div>

    </main>

    <!-- [ FOOTER ] -->
    <footer>
        <p>&copy; Math test | 2021</p>
    </footer>


    <script>

        const tasks = {
            task1: {
                description: 'Find triangle`s area.',
                inputs: ['a = 3', 'b = 4', 'c = 5']
            },
            task2: {
                description: 'Find triangle`s perimeter.',
                inputs: ['a = 5', 'b = 10', 'c = 15']
            },
            task3: {
                description: 'Find parallelepiped`s value.',
                inputs: ['a = 10', 'b = 10', 'c = 20']
            },
            task4: {
                description: 'Find average.',
                inputs: ['a = 3', 'b = 4', 'c = 5']
            },
            task5: {
                description: 'Find 2nd member of arithmetical progression.',
                inputs: ['a1 = 5', 'a2 = ?', 'a3 = 15']
            },
        };

        const setTask = () => {
            // [ select parts ]
            let select = document.getElementById('task-select');
            let select_description = document.getElementById('task-description');
            let select_inputs = document.getElementById('task-inputs');

            // [ task selected ]
            let task_id = select.options.selectedIndex;

            // get > task data
            let task_description = tasks[Object.keys(tasks)[task_id]].description;
            let task_inputs = tasks[Object.keys(tasks)[task_id]].inputs;


            // set > task
            select_description.innerHTML = task_description;
            select_inputs.innerHTML = '';
            task_inputs.forEach((input, index) => {
                select_inputs.innerHTML += `<li>${input}</li>`;
            });
        }

    </script>

</body>
</html>
