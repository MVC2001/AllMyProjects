 TextEditingController controllerfullName = TextEditingController();
  TextEditingController controllerregNo = TextEditingController();
  TextEditingController controlleryearOfStudy = TextEditingController();
  TextEditingController  controllerCourse = TextEditingController();
  TextEditingController  controllerDept = TextEditingController();
  TextEditingController  controllerSchool = TextEditingController();
  TextEditingController  controllerdays = TextEditingController();
  TextEditingController  controllerdepartingOn = TextEditingController();
  TextEditingController  controllerreturningOn = TextEditingController();
  TextEditingController  controllerreasonFor = TextEditingController();
  TextEditingController  controllerphoneNumber = TextEditingController();
  TextEditingController  controllerdate = TextEditingController();



Future<void> sentRequest() async {
    var url = Uri.parse("http://127.0.0.1:80/kazi1/studentapp/apis/sentRequestForPermssion");

    try {
      var response = await http.post(url, body: {
        "fullName": controllerfullName.text,
        "regNo": controllerregNo.text,
        "yearOfStudy": controlleryearOfStudy.text,
         "Course": controllerCourse.text,
          "Dept": controllerDept.text,
           "School": controllerSchool.text,
            "days":controllerdays.text,
             "departingOn": controllerdepartingOn.text,
              "returningOn": controllerreturningOn.text,
               "reasonFor": controllerreasonFor.text,
                "phoneNumber":controllerphoneNumber.text,
                "date":controllerdate.text,
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