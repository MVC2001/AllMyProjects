package springsecuritycouse1.repositories;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;
import springsecuritycouse1.entities.Shop;

@Repository
public interface ShopRepository extends JpaRepository<Shop, Long> {
}
