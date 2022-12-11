<?php
session_start();
if (!isset($_SESSION['uname'])) {
    header("Location: http://localhost/library_management/admin/admin_login.php");
}

echo $_SESSION['uname'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Library Management System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../assets/css/index.css" />
</head>

<body>
    <nav id="topbar">
        <div class="logo"><img src="../assets/image/logo.png" /></div>

        <ul>
            <li>Logout</li>
        </ul>
    </nav>
    <div class="wrapper">
        <nav id="sidebar" class="activeSidebar">
            <div class="iconParent">
                <i class="fa-solid fa-angles-left icon"></i>
            </div>
            <ul>
                <li class="active">Dashboard</li>
                <li>Books</li>
                <li>Author</li>
                <li>Category</li>
                <li>Issue</li>
                <li>Publication</li>
                <li>Students</li>
            </ul>
        </nav>
        <div class="content">
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus nulla
                corrupti quibusdam! Praesentium dolorum quod adipisci enim minus
                reiciendis, et est eius nobis corporis voluptas impedit magnam fugiat!
                Aspernatur, qui. Nesciunt asperiores voluptate omnis mollitia ducimus,
                illum, tempore suscipit sint ratione qui esse illo? Cumque est debitis
                sed dolorem, qui ea deserunt provident repudiandae, corporis
                architecto assumenda modi iusto quis. Eos ipsam, odio perferendis,
                asperiores sint vel facere magni aperiam, inventore saepe accusantium?
                Cupiditate vero iste, voluptate adipisci hic maxime rem sunt in esse
                aperiam corrupti minima eum animi saepe? Animi labore aut sunt
                aliquam, consequatur, cupiditate reiciendis perspiciatis facere quo
                hic consequuntur numquam autem iure soluta omnis eveniet libero esse
                odit id nulla nostrum laudantium assumenda optio ullam. Sapiente?
                Voluptates quidem nesciunt soluta sit aut eaque laudantium tenetur
                adipisci? Necessitatibus, ducimus aliquam ex distinctio illo non harum
                atque praesentium ipsum eum! Quis, dicta? Ab recusandae quae atque eum
                nisi. Error dolorum distinctio nemo facere minus optio nesciunt ipsa
                eum pariatur? Recusandae veniam suscipit cum nobis sapiente dicta
                provident officia fugiat placeat. Non hic unde nobis veritatis itaque
                suscipit impedit. Quibusdam placeat corporis cum, quod et blanditiis
                recusandae doloribus tempora optio deleniti id illum odio illo aut
                velit, aliquam molestias laboriosam quasi aliquid. Dolore voluptatem
                maiores eligendi harum tempore eum. Dolorum excepturi vero sequi
                similique exercitationem. Aliquam iste, amet rem nulla corrupti
                architecto dolor voluptates sed odio adipisci perferendis ipsam.
                Voluptatibus eligendi nobis amet. Nulla, exercitationem? Sed aliquam
                dolorem autem. Cum, magni! Provident nihil quae, dolorem similique
                officiis excepturi officia animi molestias itaque possimus nisi
                numquam delectus modi, quaerat minus non atque reiciendis fugiat magni
                soluta sapiente, laudantium corrupti pariatur! Repudiandae non fuga
                neque reiciendis ipsa magnam, voluptate veniam quo officia unde
                incidunt assumenda, facere dignissimos voluptatem. Eveniet, porro
                nobis dignissimos in incidunt non voluptas. Eius dolorum reiciendis
                odit hic. Autem quas, maiores assumenda delectus, qui totam facilis
                dolore placeat consectetur esse ipsum accusamus soluta? Repellat
                laborum veniam praesentium exercitationem, eum maxime soluta illum
                suscipit ullam voluptates tenetur modi tempora! Quo alias provident,
                dolores dicta in error magni praesentium hic odio facilis tempore eos
                modi excepturi, nostrum recusandae asperiores magnam exercitationem
                doloribus. Repellendus recusandae libero repellat blanditiis?
                Repellendus, debitis totam! Necessitatibus, sed vel? In excepturi,
                dicta atque perferendis dolorem cumque non iusto nostrum libero at
                deserunt provident ipsa nam sit ullam id, eius corporis eum quae et
                placeat vitae amet. Nostrum dicta, porro iste iure repellendus
                perspiciatis fugit necessitatibus quaerat quod reprehenderit
                laboriosam nulla magnam officia! Porro accusamus, dignissimos illum
                excepturi vero numquam obcaecati qui ducimus vel maxime hic delectus!
                Nesciunt, tenetur odio natus cum officiis recusandae possimus sed.
                Ducimus accusantium voluptate asperiores! Tempore rerum facere quaerat
                aliquid reiciendis culpa earum animi explicabo dolorum porro, dicta
                eaque officia praesentium corrupti? Labore deserunt velit totam fugit
                illo voluptatum aperiam quos earum enim rerum. Blanditiis delectus sed
                voluptatum hic in alias culpa asperiores minus, eligendi architecto
                velit ducimus ab provident necessitatibus eum. Tempora magni sunt,
                repudiandae ratione eos mollitia quam quibusdam id, voluptates
                consequatur dolore corporis voluptatem illum, obcaecati deleniti
                accusantium qui vero temporibus iusto enim. Repudiandae, fuga earum.
                Qui, dolores ipsa. Soluta error repellendus modi vel nulla alias
                voluptates rerum neque harum perferendis beatae quidem quae aspernatur
                illum, expedita non consectetur recusandae, similique dolore, quisquam
                repellat consequuntur hic architecto! Quae, cum. Voluptatum aperiam
                maxime tempora quasi distinctio? Quasi est qui reprehenderit sapiente
                porro enim, magni maxime debitis laboriosam, numquam ea laborum
                corrupti, dolore corporis. Beatae facere possimus minima quia, id ab.
                Maiores fuga quod sint sed, ducimus necessitatibus saepe culpa enim
                earum, quidem, eius ea! Repellendus, amet modi quos alias, at quam
                deserunt deleniti vitae sit nesciunt voluptatem? Suscipit, quasi
                exercitationem.
            </p>
        </div>
    </div>
    <script src="../assets/js/index.js"></script>
</body>

</html>