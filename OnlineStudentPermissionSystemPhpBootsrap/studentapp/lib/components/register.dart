import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;
import 'package:doctorapointapp/components//login.dart';

class AddData extends StatefulWidget {
  @override
  _AddDataState createState() => _AddDataState();
}

class _AddDataState extends State<AddData> {
  TextEditingController controllerName = TextEditingController();
  TextEditingController controllerEmail = TextEditingController();
  TextEditingController controllerPassword = TextEditingController();

  bool dataSuccessfullyRegistered = false;

  Future<void> addData() async {
    var url = Uri.parse("http://localhost:80/kazi1R/studentapp/apis/registration.php");

    try {
      var response = await http.post(url, body: {
        "fullName": controllerName.text,
        "email": controllerEmail.text,
        "password": controllerPassword.text,
      });

      if (response.statusCode == 200) {
        var responseData = response.body;
        if (responseData == 'Email already taken') {
          showToast('Email already taken');
        } else {
          // Data added successfully
          setState(() {
            dataSuccessfullyRegistered = true;
          });
          showToast('Successfully registered!');
        }
      } else {
        // Handle other status codes if needed
        throw Exception('Failed to add data');
      }
    } catch (e) {
      // Handle errors
      print('Error: $e');
      setState(() {
        dataSuccessfullyRegistered = false;
      });
      showToast('Failed to add data. Please try again.');
    }
  }


  void showToast(String message) {
    ScaffoldMessenger.of(context).showSnackBar(
      SnackBar(
        content: Text(message),
        action: SnackBarAction(
          label: 'OK',
          onPressed: () {
            ScaffoldMessenger.of(context).hideCurrentSnackBar();
          },
        ),
      ),
    );
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        backgroundColor: Colors.black54,
        title: Text(
          "Student Signup",
          style: TextStyle(fontFamily: "Netflix"),
        ),
      ),
      body: Padding(
        padding: const EdgeInsets.all(20.0),
        child: ListView(
          children: <Widget>[
            Column(
              children: <Widget>[
                SizedBox( height:20.0),
                Image(image: AssetImage("images/logo.png"), height: 200.0,width: 400.0,),
                SizedBox(height: 9.0,),
                TextField(
                  controller: controllerName,
                  style: TextStyle(fontFamily: "Netflix", fontSize: 15),
                  decoration: InputDecoration(
                    hintText: "Enter Fullname",
                    labelText: "Fullname",
                    hintStyle: TextStyle(fontFamily: "Netflix"),
                    labelStyle: TextStyle(fontFamily: "Netflix"),
                  ),
                ),
                TextField(
                  controller: controllerEmail,
                  style: TextStyle(fontFamily: "Netflix", fontSize: 15),
                  decoration: InputDecoration(
                    hintText: "Enter Email",
                    labelText: "Email",
                    hintStyle: TextStyle(fontFamily: "Netflix"),
                  ),
                ),
                TextField(
                  controller: controllerPassword,
                  style: TextStyle(fontFamily: "Netflix", fontSize: 15),
                  decoration: InputDecoration(
                    hintText: "Enter Password",
                    labelText: "Password",
                    hintStyle: TextStyle(fontFamily: "Netflix"),
                  ),
                ),
                Padding(
                  padding: const EdgeInsets.all(10.0),
                ),
                Container(
                  height: 50,
                  width: double.infinity,
                  child: ElevatedButton(
                    onPressed: () {
                      if (controllerName.text.isEmpty) {
                        showToast("Name is required.");
                      } else if (controllerEmail.text.isEmpty) {
                        showToast("Email is required.");
                      } else if (controllerPassword.text.isEmpty) {
                        showToast("Password is required.");
                      } else {
                        addData();
                        if (dataSuccessfullyRegistered) {
                          Navigator.pushReplacement(
                            context,
                            MaterialPageRoute(builder: (context) => PLogin()),
                          );
                        }
                      }
                    },
                    child: Text(
                      "Register",
                      style: TextStyle(color: Colors.white),
                    ),
                    style: ElevatedButton.styleFrom(
                      backgroundColor: Colors.black54,
                    ),
                  ),
                ),
              ],
            ),
          ],
        ),
      ),
    );
  }
}
