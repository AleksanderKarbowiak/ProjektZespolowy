using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using Microsoft.EntityFrameworkCore;

namespace SCW.Entities
{
    public class SCWDbContext :DbContext
    {
        private string _connectionString = "Server=DESKTOP-LO55SVU;Database=SCWDb;Trusted_Connection=True;"; //to narazie tylko
        public DbSet<Faculty> Faculties { get; set; }
        public DbSet<FieldOfStudy> Fields { get; set; }
        public DbSet<Subject> Subjects { get; set; }
        public DbSet<Tutor> Tutors { get; set; }
        public DbSet<Lectuer> Lectuers { get; set; }
        public DbSet<User> Users { get; set; }
        public DbSet<Material> Materials { get; set; }
        public DbSet<OpinionLectuer> OpinionsLectuers { get; set; }
        public DbSet<OpinionTutor> OpinionsTutors { get; set; }

        protected override void OnModelCreating(ModelBuilder modelBuilder)
        {
            modelBuilder.Entity<Faculty>()
                .Property(f => f.Name)
                .IsRequired()
                .HasMaxLength(50);

            modelBuilder.Entity<FieldOfStudy>()
                .Property(fs => fs.Name)
                .IsRequired()
                .HasMaxLength(50);

            modelBuilder.Entity<Subject>()
                .Property(s => s.Name)
                .IsRequired()
                .HasMaxLength(50);

            modelBuilder.Entity<Lectuer>()
                .Property(l => l.Name)
                .IsRequired()
                .HasMaxLength(25);
            
            modelBuilder.Entity<Lectuer>()
                .Property(l => l.Surname)
                .IsRequired()
                .HasMaxLength(25);
            modelBuilder.Entity<Lectuer>()
               .Property(l => l.Degree)
               .IsRequired()
               .HasMaxLength(15);

            modelBuilder.Entity<Lectuer>()
                .Property(l => l.Email)
                .IsRequired();


        }

        protected override void OnConfiguring(DbContextOptionsBuilder optionsBuilder)
        {
            optionsBuilder.UseSqlServer(_connectionString);
        }
    }
}
