using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using Microsoft.AspNetCore.Identity.EntityFrameworkCore;
using Microsoft.EntityFrameworkCore;
using CentrumWiedzy.Models;

namespace CentrumWiedzy.Data
{
    public class SCWDbContext : IdentityDbContext<User>
    {
        public SCWDbContext(DbContextOptions options) : base(options)
        {
        }
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
            base.OnModelCreating(modelBuilder);

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

            modelBuilder.Entity<User>()
                .HasOne(a => a.Tutor).WithOne(b => b.User)
                .HasForeignKey<Tutor>(e => e.UserId);

            modelBuilder.Entity<FacultyLectuer>()
        .HasKey(fl => new { fl.FacultyId, fl.LectuerId });
            modelBuilder.Entity<FacultyLectuer>()
                .HasOne(fl => fl.Faculty)
                .WithMany(f => f.FacultyLectuers)
                .HasForeignKey(fl => fl.FacultyId);
            modelBuilder.Entity<FacultyLectuer>()
                .HasOne(fl => fl.Lectuer)
                .WithMany(l => l.FacultyLectuers)
                .HasForeignKey(fl => fl.LectuerId);


            modelBuilder.Entity<LectuerSubject>()
        .HasKey(ls => new { ls.LectuerId, ls.SubjectId });
            modelBuilder.Entity<LectuerSubject>()
                .HasOne(ls => ls.Lectuer)
                .WithMany(l => l.LectuerSubjects)
                .HasForeignKey(ls => ls.LectuerId);
            modelBuilder.Entity<LectuerSubject>()
                .HasOne(ls => ls.Subject)
                .WithMany(s => s.LectuerSubjects)
                .HasForeignKey(ls => ls.SubjectId);


            modelBuilder.Entity<SubjectTutor>()
        .HasKey(st => new { st.SubjectId, st.TutorId });
            modelBuilder.Entity<SubjectTutor>()
                .HasOne(st => st.Subject)
                .WithMany(s => s.SubjectTutors)
                .HasForeignKey(st => st.SubjectId);
            modelBuilder.Entity<SubjectTutor>()
                .HasOne(st => st.Tutor)
                .WithMany(t => t.SubjectTutors)
                .HasForeignKey(st => st.TutorId);

        }

    }
}
