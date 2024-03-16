package crudeapp.service;

import crudeapp.entity.MyBookList;
import crudeapp.repository.MyBookRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import java.util.List;

@Service
public class MyBookService {

    @Autowired
    private MyBookRepository mybook;

    public  void saveMyBooks(MyBookList savebooks){
        mybook.save(savebooks);
    }

    public  List<MyBookList> getAllBooks(){

        return mybook.findAll();
    }


    public void deleteById(Long id){
        mybook.deleteById(id);
    }
}
