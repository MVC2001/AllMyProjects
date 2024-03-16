package springsecuritycouse1.services;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import org.springframework.web.multipart.MultipartFile;
import springsecuritycouse1.entities.Shop;
import springsecuritycouse1.repositories.ShopRepository;

import java.io.IOException;
import java.util.List;

@Service
public class ShopService {

    @Autowired
    private ShopRepository shopRepository;

    public List<Shop> getAllShops() {
        return shopRepository.findAll();
    }

    public Shop getShopById(Long id) {
        return shopRepository.findById(id).orElse(null);
    }

    public Shop saveShop(Shop shop) {
        return shopRepository.save(shop);
    }

    public void deleteShop(Long id) {
        shopRepository.deleteById(id);
    }

    public void uploadImage(Long id, MultipartFile file) throws IOException {
        Shop shop = shopRepository.findById(id).orElse(null);
        if (shop != null && file != null && !file.isEmpty()) {
            shop.setImage(file.getBytes());
            shopRepository.save(shop);
        }
    }

}
