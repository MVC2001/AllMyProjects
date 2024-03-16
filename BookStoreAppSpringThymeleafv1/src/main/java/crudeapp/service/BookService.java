package crudeapp.service;


import crudeapp.entity.Book;
import crudeapp.repository.BookRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.util.List;

@Service
public class BookService {

    @Autowired
    private BookRepository bRepo;

    public  void save(Book b){
    bRepo.save(b);
    }

    public List<Book> getAllBooks(){
        return  bRepo.findAll();
    }

    public Book getBookById(Long id){

        return bRepo.findById(id).get();
    }
    public  void deleteById(long id){
        bRepo.deleteById(id);
    }
}
