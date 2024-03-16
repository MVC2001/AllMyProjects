package springsecuritycouse1.entities;

import jakarta.persistence.*;
import lombok.Data;

@Entity
@Data
@Table(name="shop")
public class Shop {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Long id;

    private String name;

    private String category;

    private double price;

    @Lob
    private byte[] image;
}
