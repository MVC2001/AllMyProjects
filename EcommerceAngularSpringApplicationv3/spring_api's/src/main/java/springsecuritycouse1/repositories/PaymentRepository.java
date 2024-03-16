package springsecuritycouse1.repositories;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;
import springsecuritycouse1.entities.Payment;

@Repository
public interface PaymentRepository extends JpaRepository<Payment, Long> {
}