package crudeapp.controller;

import crudeapp.entity.Book;
import crudeapp.entity.MyBookList;
import crudeapp.service.BookService;
import crudeapp.service.MyBookService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.boot.Banner;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.*;
import org.springframework.web.servlet.ModelAndView;

import java.util.*;

@Controller
public class BookController {

    @Autowired
    private BookService service;

 @Autowired
 private MyBookService myBookService;

 //home controller here
    @GetMapping("/")
    public  String home(){
        return  "home";
    }
    @GetMapping("/book_register")
    public String bookRegister(){
        return  "book_register";
    }


    @GetMapping("/available_book")
    public ModelAndView getAllBooks(){
        List<Book>list=service.getAllBooks();

//        ModelAndView m = new ModelAndView();
//        m.setViewName("available_book");
//        m.addObject("book",list);
        return new ModelAndView("available_book","book",list);
    }


    @PostMapping("/save")
    public  String addBook(@ModelAttribute Book b){
    service.save(b);
    return "redirect:/available_book";
    }



    @GetMapping("/my_book")
    public  String getMyBooks(Model model){

        List<MyBookList>list= myBookService.getAllBooks();
        model.addAttribute("book",list);
        return "myBooks";
    }


    @RequestMapping("/my_list/{id}")
    public  String getLists(@PathVariable("id") Long id){
  Book b = service.getBookById(id);
  MyBookList mybookobj = new  MyBookList(b.getId(),b.getName(),b.getAuthor(),b.getPrice());
  myBookService.saveMyBooks(mybookobj);
  return  "redirect:/my_book";
    }

    @RequestMapping("/editBook/{id}")
    public  String editBook(@PathVariable("id") long id,Model model){
        Book b = service.getBookById(id);
        model.addAttribute("book", b);
        return "bookEdit";
    }

    @RequestMapping("/deleteBook/{id}")
    public  String deleteBook(@PathVariable("id") long id){
        service.deleteById(id);
        return "redirect:/available_book";
    }
}





