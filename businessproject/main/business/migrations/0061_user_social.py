# Generated by Django 2.1 on 2018-08-22 08:45

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('business', '0060_auto_20180822_0837'),
    ]

    operations = [
        migrations.CreateModel(
            name='User_Social',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('name', models.CharField(max_length=50)),
                ('icon', models.ImageField(default='noimage.jpg', upload_to='businessusericons')),
            ],
        ),
    ]
