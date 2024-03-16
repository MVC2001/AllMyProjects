
import 'package:doctorapointapp/components//login.dart';
import 'package:flutter/material.dart';



// function to trigger app build
void main() => runApp(MaterialApp(
    debugShowCheckedModeBanner: false,
    home:
    MyApp()));


class MyApp extends StatelessWidget {

  const MyApp({Key? key,}) : super(key: key);

  @override
  Widget build(BuildContext context){
    return Scaffold(
      appBar: AppBar(
        title: Text('STUDENTS PERMISSION APPLICATION'),
        backgroundColor: Colors.black54,
      ),
      body:  Column(
          children: [
            SizedBox( height:70.0),
            Image(image: AssetImage("images/logo.png"), height: 300.0, width: 600.0),
            SizedBox(height: 9.0,),
            Card(
              child: Column(
                mainAxisSize: MainAxisSize.min,
                children: <Widget>[
                  const ListTile(
                    leading: Icon(Icons.album),
                    title: Text('App info.com'),
                    subtitle: Text('Students permission application, Developer: MUDHIHR H. NYEMA(MvcSoftsTech), Phone: 0682131140, Email: nyemamudhihir@gmail.com).'),
                  ),
                  Row(
                    mainAxisAlignment: MainAxisAlignment.end,
                    children: <Widget>[
                      TextButton(
                        child: const Text('DeveloperCall.'),
                        onPressed: () {/* ... */},
                      ),
                      const SizedBox(width: 8),
                      TextButton(
                        child: const Text('+0682131140'),
                        onPressed: () {/* ... */},
                      ),
                    ],
                  ),
                ],
              ),
            ),
          ]),

      drawer: Drawer(
        child: ListView(
          padding: const EdgeInsets.all(0),
          children: [
            const DrawerHeader(
              decoration: BoxDecoration(
                color: Colors.black54,
              ), //BoxDecoration
              child: UserAccountsDrawerHeader(
                decoration: BoxDecoration(color: Colors.black54),
                accountName: Text(
                  "STUDENT LOGIN PANNEL",
                  style: TextStyle(fontSize: 18),
                ),
                accountEmail: Text(""),
                currentAccountPictureSize: Size.square(50), //circleAvatar
              ), //UserAccountDrawerHeader
            ),
            //DrawerHeader
            ListTile(
              leading: const Icon(Icons.person),
              title: const Text('Login'),
              onTap: () {
                Navigator.of(context).push(

                  MaterialPageRoute(builder: (BuildContext context)=>PLogin()
                  ),
                );
              },
            ),
            ListTile(
              leading: const Icon(Icons.list),
              title: const Text('App info'),
              onTap: () {

              },
            ),
          ],
        ),
      ), //Drawer
    );
  }
}
