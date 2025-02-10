<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        body {
            overflow-x: hidden;
        }
        .card-img-top {
            height: 200px;
            object-fit: cover;
        }
        .btn-toggle {
            width: 100%;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <header class="bg-dark text-white py-4 text-center">
        <h1>Sports Registration Website</h1>
    </header>

    <div class="container mt-4">
        <div class="card-deck">
            <div class="card sport-card" data-sport="Basketball">
                <img class="card-img-top" src="./basketball.jpg" alt="Basketball">
                <div class="card-body">
                    <h5 class="card-title">BASKETBALL</h5>
                    <p class="card-text">A game of skill, teamwork, and strategy that keeps fans on the edge.</p>
                </div>
            </div>
            <div class="card sport-card" data-sport="Football">
                <img class="card-img-top" src="./football.jpg" alt="Football">
                <div class="card-body">
                    <h5 class="card-title">FOOTBALL</h5>
                    <p class="card-text">A universal sport uniting people through passion and teamwork.</p>
                </div>
            </div>
            <div class="card sport-card" data-sport="Hockey">
                <img class="card-img-top" src="./hockey.jpg" alt="Hockey">
                <div class="card-body">
                    <h5 class="card-title">HOCKEY</h5>
                    <p class="card-text">A fast-paced game of skill and determination.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Registration Modal -->
    <div class="modal fade" id="registrationModal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">Register for Sports Event</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="registrationForm" action="register.php" method="POST">
                        <div class="form-group">
                            <label for="sportName">Sport</label>
                            <input type="text" class="form-control" id="sportName" name="sportName" readonly>
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="tel" class="form-control" id="phone" name="phone" required>
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select class="form-control" id="gender" name="gender" required>
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Do you need accommodation?</label>
                            <div class="btn-group btn-group-toggle d-flex" data-toggle="buttons">
                                <label class="btn btn-outline-primary btn-toggle">
                                    <input type="radio" name="accommodation" value="Yes"> Yes
                                </label>
                                <label class="btn btn-outline-secondary btn-toggle">
                                    <input type="radio" name="accommodation" value="No" checked> No
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('.sport-card').click(function () {
                let sport = $(this).data('sport');
                $('#sportName').val(sport);
                $('#registrationModal').modal('show');
            });
        });
    </script>
</body>

</html>
