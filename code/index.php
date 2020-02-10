<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>Sandbox</title>
</head>
<body>

<div id="root">
    <div class="container">
        <h1 class="fleft">List of users</h1>
        <button class="fright addNew" @click="showingAddModal=true;">Add New</button>
        <div class="clear"></div>
        <hr>
        <p class="errorMessage" id="errorMessage" v-if="errorMessage">
                {{errorMessage}}
        </p>
        <p class="successMessage" id="successMessage" v-if="successMessage">
            {{successMessage}}
        </p>
        <table class="list">
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <tr v-for="user in users">
                <td>{{user.id}}</td>
                <td>{{user.username}}</td>
                <td>{{user.email}}</td>
                <td>{{user.mobile}}</td>
                <td><button @click="showingEditModal=true; selectUser(user);">Edit</button></td>
                <td><button @click="showingDeleteModal=true; selectUser(user);">Delete</button></td>
            </tr>
        </table>
    </div>

    <div class="modal" id="addModal" v-if="showingAddModal">
        <div class="modalContainer">
            <div class="modalHeading">
                <p class="fleft">Add New User</p>
                <button class="fright close" @click="showingAddModal=false;">x</button>
                <div class="clear"></div>
            </div>
            <div class="modalContent">
                <table class="form">
                    <tr>
                        <th>Username</th>
                        <th> : </th>
                        <td><input type="text" name="" id="username" v-model="newUser.username"></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <th> : </th>
                        <td><input type="email" name="" id="email" v-model="newUser.email"></td>
                    </tr>
                    <tr>
                        <th>Mobile</th>
                        <th> : </th>
                        <td><input type="tel" name="" id="mobile" v-model="newUser.mobile"></td>
                    </tr>
                    <tr>
                        <th></th>
                        <th></th>
                        <td><button @click="showingAddModal=false; saveUser();">Save</button></td>
                    </tr>

                </table>
            </div>
        </div>
    </div>

    <div class="modal" id="editModal" v-if="showingEditModal">
        <div class="modalContainer">
            <div class="modalHeading">
                <p class="fleft">Edit User</p>
                <button class="fright close" @click="showingEditModal=false;">x</button>
                <div class="clear"></div>
            </div>
            <div class="modalContent">
                <table class="form">
                    <tr>
                        <th>Username</th>
                        <th> : </th>
                        <td><input type="text" name="" v-model="clickedUser.username"></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <th> : </th>
                        <td><input type="email" name="" v-model="clickedUser.email"></td>
                    </tr>
                    <tr>
                        <th>Mobile</th>
                        <th> : </th>
                        <td><input type="text" name="" v-model="clickedUser.mobile"></td>
                    </tr>
                    <tr>
                        <th></th>
                        <th></th>
                        <td><button @click="showingEditModal=false; updateUser();">Update</button></td>
                    </tr>

                </table>
            </div>
        </div>
    </div>

    <div class="modal" id="editModal" v-if="showingDeleteModal">
        <div class="modalContainer">
            <div class="modalHeading">
                <p class="fleft">Are you sure? </p>
                <button class="fright close" @click="showingDeleteModal=false;">x</button>
                <div class="clear"></div>
            </div>
            <div class="modalContent">
                <p>Your are going to delete <strong>'{{clickedUser.username}}'</strong></p>
                <br><br><br>
                <button @click="showingDeleteModal=false; deleteUser();">Yes</button>
                <button @click="showingDeleteModal=false;">No</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="axios.js"></script>
<script type="text/javascript" src="vue.js"></script>
<script type="text/javascript" src="app.js"></script>
</body>
</html>