<?php include('header.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nutritious Food | Teacher</title>
    <link rel="stylesheet" href="./../css/style.css">
</head>

<body>
    <div class="container-fluid">
        <div class="mt-2">
            <div class="row">
                <div class="col-md-6">
                    <p class="page-title mb-0 font-weight-bold">Stage Details</p>
                    <p class="page-subTitle mb-0">Add or Update Stage Details</p>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-md-6 mt-3">
                <div class="border p-2">
                    <p class="page-subTitle mb-0 font-weight-bold text-info">Stage Details</p>
                    <form method="post" class="mt-3">
                        <div class="container-fluid">
                            <div class="form-group">
                                <label>Current Stage<span class="text-danger">*</span></label>
                                <select class="form-control" name="current_stage" required>
                                    <option value="">-- Select --</option>
                                    <option value="Prenatal">Prenatal</option>
                                    <option value="Postnatal">Postnatal</option>
                                    <option value="0-3 Years">0-3 Years Baby</option>
                                    <option value="3-6 Years Child">3-6 Years Child</option>
                                </select>
                            </div>
                            <div class="text-right">
                                <button class="btn btn-primary btn-sm" type="submit" name="submit">Submit</button>
                                <button class="btn btn-danger btn-sm" type="reset" name="reset">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>