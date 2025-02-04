<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CirculationController;
use App\Http\Controllers\BorrowController;


//////////////////////////////////////////////////////////
//if you want to run the log in of employee
// Route::get('/', function () {
//     return view('login_employee');
// });

// Route::get('/', function () {
//     return view('DASHBORDLandingpage_employee'); 
// });



Route::get('/', function () {
    return view('login_employee'); 
});

Route::get('/DASHBORDLandingpage_employee', function () {
    return view('DASHBORDLandingpage_employee'); 
});

Route::get('/Profile', function () {
    return view('Profile'); 
});

Route::get('/Settings', function () {
    return view('Settings'); 
});


Route::get('/DASHBORDLandingpage_employee', function () {
    return view('DASHBORDLandingpage_employee'); 
});

Route::get('/DASHBORDLandingpage_employee1', function () {
    return view('DASHBORDLandingpage_employee'); 
})->name('DASHBOARDLandingpage_employee');

Route::get('/EMPLOYEE', function () {
    return view('EMPLOYEE'); 
});

Route::get('/RESERVATION', function () {
    return view('RESERVATION'); 
});


/////CATALOGER
Route::get('/CATALOGER', function () {
    return view('CATALOGER'); 
});
Route::get('/CATALOG-ADDBOOK', function () {
    return view('Catalog.CATALOG-ADDBOOK'); 
});
Route::get('/CATALOG-ADDCATEGORIES', function () {
    return view('Catalog.CATALOG-ADDCATEGORIES'); 
});
Route::get('/CATALOG-EDIT_ITEM', function () {
    return view('Catalog.CATALOG-EDIT_ITEM'); 
});
Route::get('/CATALOG-VIEW_ITEM', function () {
    return view('Catalog.CATALOG-VIEW_ITEM'); 
});



Route::get('/MEMBERS', function () {
    return view('MEMBERS'); 
});


/////CIRCULATION
Route::get('/CIRCULATION', function () {
    return view('CIRCULATION'); 
});
Route::get('/Check-out', function () {
    return view('Circulation.Check-out'); 
});
Route::get('/Edit', function () {
    return view('Circulation.Edit'); 
});


/////CIRCULATION_REPORTS
Route::get('/CIRCULATION_REPORTS', function () {
    return view('CIRCULATION_REPORTS'); 
});
Route::get('/Mostly', function () {
    return view('Circulation_Reports.Mostly'); 
});
Route::get('/Least', function () {
    return view('Circulation_Reports.Least'); 
});
Route::get('/Advance', function () {
    return view('Circulation_Reports.Advance'); 
});


Route::get('/MEMBER_REPORTS', function () {
    return view('MEMBER_REPORTS'); 
});

Route::get('/OVERDUE_REPORTS', function () {
    return view('OVERDUE_REPORTS'); 
});

Route::get('/CATALOG', function () {
    return view('CATALOG'); 
});


/////CATALOG_REPORTS
Route::get('/CATALOG_REPORTS', function () {
    return view('CATALOG_REPORTS'); 
});
Route::get('/New', function () {
    return view('Catalog_Reports.New'); 
});
Route::get('/Category', function () {
    return view('Catalog_Reports.Category'); 
});
Route::get('/Donated', function () {
    return view('Catalog_Reports.Donated'); 
});
Route::get('/CategoryList', function () {
    return view('Catalog_Reports.CategoryList'); 
});







// Handle Login Submission
Route::post('/login_employee', [AuthController::class, 'login_employee'])->name('login_employee');

Route::post('/logout', [AuthController::class, 'destroy'])->name('logout');

//creation of employees
Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');
// update of employees
Route::post('/employees/update', [EmployeeController::class, 'update'])->name('employees.update');
// softdelete employees
Route::post('/employees/delete', [EmployeeController::class, 'softDelete'])->name('employees.delete');




Route::get('/EMPLOYEE', function () {
    return view('EMPLOYEE'); 
})->name('employee.page');





Route::post('/books', [BookController::class, 'store'])->name('book.store');
Route::post('/books/add-copy', [BookController::class, 'addCopy'])->name('books.addCopy');
Route::get('/catalog/show', [BookController::class, 'showCatalog'])->name('catalogs');
Route::get('/CATALOG', function () {
    return view('CATALOG'); 
})->name('catalog');

Route::get('/EMPLOYEE/show', [EmployeeController::class, 'showEmployee'])->name('employee.show');
Route::get('/User/show', [EmployeeController::class, 'showUser'])->name('user.show');
Route::get('/members', [EmployeeController::class, 'index']);


Route::get('/categories/show', [CategoryController::class, 'index']);
Route::get('/book/adding/categories', [CategoryController::class, 'index2']);
Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');



Route::get('/circulation/show', [CirculationController::class, 'index'])->name('view.circulation');
Route::get('/circulation/{id}/edit', [CirculationController::class, 'edit'])->name('circulation.edit');
Route::post('/circulation/update', [CirculationController::class, 'updateCirculation'])->name('circulation.update');

Route::get('/circulation/add', [CirculationController::class, 'create']);
Route::post('/circulations/store', [CirculationController::class, 'store'])->name('circulations.store');


Route::get('/borrows', [BorrowController::class, 'index'])->name('borrows.index');
Route::put('/borrows/update/{id}', [BorrowController::class, 'updateBorrow'])->name('borrow.update');

